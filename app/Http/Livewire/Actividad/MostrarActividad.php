<?php

namespace App\Http\Livewire\Actividad;

use App\Models\Actividad;
use App\Models\ActividadCompleto;
use App\Models\Ciclo;
use App\Models\Documento;
use App\Models\Entrada;
use App\Models\EntradaProveedor;
use App\Models\Salida;
use App\Models\SalidaCompleto;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class MostrarActividad extends Component
{
    use WithFileUploads;

    public $actividad = null;
    public $salida = null;
    public $entrada_proveedor = null;
    public $open = false;
    public $openDoc = false;
    public $estado = false;
    public $completado;
    public $ciclo;
    public $randomID;
    public $archivo;

    protected $rules = [
        'archivo' => 'required',
    ];

    public function mount(Actividad $actividad, Ciclo $ciclo)
    {
        $this->actividad = $actividad;
        $this->ciclo = $ciclo;
        if ($this->actividad->estado) {
            $this->estado = true;
        }
        $this->randomID = rand();
    }

    public function abrirModal($salida_id)
    {
        $this->salida = Salida::query()
            ->with('clientes')
            ->where('id', $salida_id)
            ->with(['documentos' => function ($query) {
                $query->where('ciclo_id', $this->ciclo->id);
            }])
            ->first();
        $this->open = true;
    }

    public function abrirModalDoc($entrada_proveedor_id)
    {
        $this->entrada_proveedor = EntradaProveedor::query()
            ->with('entrada', 'proveedor')
            ->with(['documentos' => function ($query) {
                $query->where('ciclo_id', $this->ciclo->id);
            }])
            ->where('id', $entrada_proveedor_id)
            ->first();
        $this->openDoc = true;
    }

    public function completarActividad()
    {
        if ($this->estado) {
            $act_com = ActividadCompleto::where('actividad_id', '=', $this->actividad->id)
                ->where('ciclo_id', '=', $this->ciclo->id)
                ->first();
            $act_com->delete();
            $this->estado = false;
        } else {
            ActividadCompleto::create([
                'actividad_id' => $this->actividad->id,
                'ciclo_id' => $this->ciclo->id
            ]);
            $this->estado = true;
        }
    }

    public function enviarDocumentoSalida()
    {
        if (auth()->check()) {
            $this->validate();
            $rutaCarpeta = '/public/salidas';

            //verificar si existe la carpeta storage/app/public/salidas, crear si no existe
            if (!Storage::exists($rutaCarpeta)) {
                Storage::makeDirectory($rutaCarpeta);
            }

            //copiar archivo a la carpeta storage/app/public/salidas
            $nombreArchivo = $this->archivo->getClientOriginalName();
            if (!$nombreArchivo) {
                $nombreArchivo = "Archivo adjunto";
            }

            $existe = Storage::disk('public')->exists('salidas/' . $nombreArchivo);
            $num = 0;
            if ($existe) {
                $aux = $nombreArchivo;
                while ($existe) {
                    $num++;
                    $aux = $num . '_' . $aux;
                    $existe = Storage::disk('public')->exists('salidas/' . $aux);
                    $aux = $nombreArchivo;
                }
                $nombreArchivo = $num . '_' . $nombreArchivo;
            }

            $this->archivo->storeAs($rutaCarpeta, $nombreArchivo);

            $documento = Documento::create([
                'nombre' => $nombreArchivo,
                'enlace_interno' => 'salidas' . '/' . $nombreArchivo
            ]);

            $salidaCompleto = SalidaCompleto::create([
                'ciclo_id' => $this->ciclo->id,
                'documento_id' => $documento->id,
                'salida_id' => $this->salida->id
            ]);

            $this->open = false;
            $this->randomID = rand();
            $this->emit('guardado', "El documento '$nombreArchivo' fue enviado.");

        } else {
            return redirect()->route('login');
        }
    }

    public function eliminarArchivo(Documento $doc)
    {
        $salida_completo = SalidaCompleto::where('documento_id', '=', $doc->id);
        $salida_completo->delete();
        Storage::disk('public')->delete($doc->enlace_interno);
        $doc->delete();
        $this->open = false;
        $this->emit('guardado', "El documento '$doc->nombre' fue eliminado.");
    }

    public function render()
    {
        return view('livewire.actividad.mostrar-actividad');
    }
}
