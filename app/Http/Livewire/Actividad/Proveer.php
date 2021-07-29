<?php

namespace App\Http\Livewire\Actividad;

use App\Models\Actividad;
use App\Models\Ciclo;
use App\Models\Documento;
use App\Models\EntradaCompleto;
use App\Models\EntradaProveedor;
use App\Models\SalidaCompleto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Proveer extends Component
{
    use WithFileUploads;

    public $ciclo_seleccionado = 1;
    public $ent_prv_seleccionado = null;
    public $abrir = false;
    public $ciclos;
    public $archivo;
    public $randomID = 0;

    protected $rules = [
        'archivo' => 'required',
    ];

    public function mount()
    {
        $this->randomID = rand();
    }

    public function abrirModal(EntradaProveedor $ent_prv)
    {
        $this->ent_prv_seleccionado = $ent_prv;
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
//            $this->reset(['propiedad1', 'propiedad2', ]);
        session()->flash('message', "El documento '$nombreArchivo' fue enviado.");
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
        $proveedor = array();
        foreach (Auth::user()->roles as $rol) {
            array_push($proveedor, $rol->entidad->proveedor->id);
        }

        $ent_prov = EntradaProveedor::whereIn('proveedor_id', function ($query) {
            $entID = array();
            foreach (Auth::user()->roles as $rol) {
                array_push($entID, $rol->entidad->id);
            }

            $query->select('id')
                ->from('proveedores')
                ->whereIn('entidad_id', $entID);
        })
            ->get();

        $completos = 0;
        $total = $ent_prov->count();
        foreach ($ent_prov as $ep) {
            if ($ep->documentosCicloActual($this->ciclo_seleccionado)->count()) {
                $completos++;
            }
        }
        $porcentaje = $total === 0 ? 0 : ($completos / $total * 100);

        $this->ciclos = Ciclo::orderBy('nombre', 'asc')->get();
        return view('livewire.actividad.proveer')
            ->with(compact('proveedor', 'ent_prov', 'completos', 'total', 'porcentaje'));
    }
}
