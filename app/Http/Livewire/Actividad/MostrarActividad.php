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
    public $archivo;

    protected $rules = [
        'archivo' => 'required',
    ];

    public function mount(Actividad $actividad, Ciclo $ciclo)
    {
        $this->actividad = $actividad;
        $this->ciclo = $ciclo;
    }

    public function abrirModal(Salida $salida)
    {
        $this->salida = $salida;
        $this->open = true;
    }

    public function abrirModalDoc(EntradaProveedor $entrada_proveedor)
    {
        $this->entrada_proveedor = $entrada_proveedor;
        $this->openDoc = true;
    }

    public function completarActividad()
    {
//      fecha_operacion datetime
//      actividad_responsable_id bigint(20) UN
//      ciclo_id bigint(20) UN
//      documento_id

        ActividadCompleto::where('ciclo_id');


        $this->estado = !$this->estado;
        $this->actividad->estado = $this->estado;
        $this->actividad->save();
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

        } else {
            return redirect()->route('login');
        }
    }

    public function eliminarArchivo(Documento $doc)
    {
        $salida_completo = SalidaCompleto::where('documento_id', '=', $doc->id);
        $salida_completo->delete();
//        Storage::delete('app/public/' . $doc->enlace_interno);
        Storage::disk('public')->delete($doc->enlace_interno);
        //  salidas/mysql.pptx
        //  storage\app\public\salidas
        $doc->delete();
        $this->open = false;
    }

    public function render()
    {
        return view('livewire.actividad.mostrar-actividad');
    }
}
