<?php

namespace App\Http\Livewire\Actividad;

use App\Models\Actividad;
use App\Models\Ciclo;
use App\Models\Documento;
use App\Models\EntradaCompleto;
use App\Models\EntradaProveedor;
use App\Models\Proceso;
use App\Models\SalidaCompleto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Proveer extends Component
{
    use WithFileUploads;

    public $ciclo_seleccionado = 1; // Este parametro viene desde index
    public $entidad_id = null; // Este parametro viene desde index
    public $abrir = false;
    public $procesos, $proceso_seleccionado = 96;
    public $ent_prv_seleccionado = null, $archivo, $randomID = 0;

    public $listeners = [
        'cicloCambiado' => 'cicloCambiado'
    ];

    protected $rules = [
        'archivo' => 'required',
    ];

    public function mount($ciclo_id, $entidad_id)
    {
        $this->ciclo_seleccionado = $ciclo_id;
        $this->entidad_id = $entidad_id;
        $this->randomID = rand();

        $this->procesos = Proceso::query()
            ->whereIn('id', function ($q1) {
                $q1->select('proceso_id')
                    ->from('actividades')
                    ->whereIn('id', function ($q2) {
                        $q2->select('actividad_id')
                            ->distinct()
                            ->from('entrada_proveedores')
                            ->whereIn('proveedor_id', function ($q3) {
                                $q3->select('id')
                                    ->from('proveedores')
                                    ->whereIn('entidad_id', $this->entidad_id);
                            });
                    });
            })
            ->orderBy('nombre')
            ->get();
        $this->proceso_seleccionado = $this->procesos->first()->id;
    }

    public function cicloCambiado($ciclo_id)
    {
        $this->ciclo_seleccionado = $ciclo_id;
    }

    public function abrirModal($ent_prv_id)
    {
        $this->ent_prv_seleccionado = EntradaProveedor::query()
            ->with('entrada', 'actividad')
            ->with(['documentos' => function ($query) {
                $query->where('ciclo_id', $this->ciclo_seleccionado);
            }])
            ->where('id', $ent_prv_id)
            ->first();
        $this->abrir = true;
    }

    public function enviarDocumento()
    {
        $this->validate();
        $rutaCarpeta = '/public/entradas';

        //verificar si existe la carpeta storage/app/public/salidas, crear si no existe
        if (!Storage::exists($rutaCarpeta)) {
            Storage::makeDirectory($rutaCarpeta);
        }

        //copiar archivo a la carpeta storage/app/public/entradas
        $nombreArchivo = $this->archivo->getClientOriginalName();
        if (!$nombreArchivo) {
            $nombreArchivo = "Archivo adjunto";
        }

        $existe = Storage::disk('public')->exists('entradas/' . $nombreArchivo);
        $num = 0;
        if ($existe) {
            $aux = $nombreArchivo;
            while ($existe) {
                $num++;
                $aux = $num . '_' . $aux;
                $existe = Storage::disk('public')->exists('entradas/' . $aux);
                $aux = $nombreArchivo;
            }
            $nombreArchivo = $num . '_' . $nombreArchivo;
        }

        $this->archivo->storeAs($rutaCarpeta, $nombreArchivo);

        $documento = Documento::create([
            'nombre' => $nombreArchivo,
            'enlace_interno' => 'entradas' . '/' . $nombreArchivo
        ]);

        $entradaCompleto = EntradaCompleto::create([
            'ciclo_id' => $this->ciclo_seleccionado,
            'documento_id' => $documento->id,
            'entrada_proveedor_id' => $this->ent_prv_seleccionado->id
        ]);

        $this->abrir = false;
        $this->randomID = rand();
        $this->emit('guardado', "El documento '$nombreArchivo' fue enviado.");
    }

    public function eliminarArchivo(Documento $doc)
    {
        $entrada_completo = EntradaCompleto::where('documento_id', '=', $doc->id);
        $entrada_completo->delete();
        Storage::disk('public')->delete($doc->enlace_interno);
        $doc->delete();
        $this->abrir = false;
        session()->flash('message', "El documento '$doc->nombre' fue eliminado.");
    }

    public function render()
    {
        $ent_prov = EntradaProveedor::query()
            ->addSelect(['cantidad' => EntradaCompleto::select(DB::raw('count(1)'))
                ->whereColumn('entrada_proveedor_id', 'entrada_proveedores.id')
                ->where('ciclo_id', $this->ciclo_seleccionado)
                ->limit(1)
            ])
            ->with('entrada', 'actividad')
            ->whereIn('proveedor_id', function ($query) {
                $query->select('id')
                    ->from('proveedores')
                    ->whereIn('entidad_id', $this->entidad_id);
            })
            ->whereIn('actividad_id', function ($query2) {
                $query2->select('id')
                    ->from('actividades')
                    ->where('proceso_id', $this->proceso_seleccionado);
            })
            ->get();

        $completos = count($ent_prov->where('cantidad', '>', 0));
        $total = $ent_prov->count();
        $porcentaje = $total === 0 ? 0 : ($completos / $total * 100);

        return view('livewire.actividad.proveer')
            ->with(compact('ent_prov', 'completos', 'total', 'porcentaje'));
    }
}
