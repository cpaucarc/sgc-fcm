<?php

namespace App\Http\Livewire\Convalidacion\Solicitud;

use App\Models\ConvalidacionEstudiante;
use App\Models\Documento;
use App\Models\DocumentoConvalidacion;
use Carbon\Carbon;
use App\Models\Estudiante;
use App\Models\Convalidacion;
use App\Models\SolicitudConvalidacion;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class EnviarRequisito extends Component
{
    use WithFileUploads;

    public $abrir = false;
    public $archivo = null;
    public $requisitos = null;
    public $requisitoSeleccionado = 0;
    public $solicitud = null;
    public $convalidacionEstudiante = null;

    protected $rules = [
        'archivo' => 'required',
        'requisitoSeleccionado' => 'required|gt:0'
    ];

    public function mount()
    {
        $this->solicitudActual();
    }

    public function render()
    {
        $this->requisitosFaltantes();
        return view('livewire.convalidacion.solicitud.enviar-requisito');
    }

    public function guardarDocumento()
    {
        $this->validate();

        //Si no hay solicitud, se crea (estado 1:en evaluacion)
        if (is_null($this->solicitud)) {
            $this->solicitud = SolicitudConvalidacion::create([
                'estudiante_id' => (Estudiante::query()
                    ->where('persona_id', auth()->user()->persona_id)->first())->id,
                'estado_id' => 1,
            ]);
            $this->convalidacionEstudiante = ConvalidacionEstudiante::create([
                'estudiante_id' => (Estudiante::query()
                    ->where('persona_id', auth()->user()->persona_id)->first())->id,
                'convalidacion_id' => (Convalidacion::query()
                    ->where('fecha_fin', '>=',  Carbon::now())
                    ->where('fecha_inicio', '<=',  Carbon::now())->first())->id,
            ]);
            $this->emit('solicitudCreado');
        }

        //Guardar en Documentos
        //sgc-fcm\storage\app\public\solicitud\convalidacion\documento.pdf
        $rutaCarpeta = '/public/solicitud/convalidacion';
        if (!Storage::exists($rutaCarpeta)) {
            Storage::makeDirectory($rutaCarpeta);
        }
        $archivoRecibido = $this->archivo->getClientOriginalName();
        $archivoRecibidoNombre = pathinfo($archivoRecibido, PATHINFO_FILENAME);
        $archivoRecibidoExt = pathinfo($archivoRecibido, PATHINFO_EXTENSION);
        $nombreFinal = $archivoRecibidoNombre . '_' . now()->format('Ymdhis') . '.' . $archivoRecibidoExt;
        $this->archivo->storeAs($rutaCarpeta, $nombreFinal);
        $documento = Documento::create([
            'nombre' => $nombreFinal,
            'enlace_interno' => 'solicitud/convalidacion/' . $nombreFinal
        ]);

        //Guardar en documento_solicitud_bachiller
        DocumentoConvalidacion::create([
            'solicitud_convalidacion_id' => $this->solicitud->id,
            'requisito_id' => $this->requisitoSeleccionado,
            'documento_id' => $documento->id,
        ]);

        $this->reset(['archivo', 'requisitos', 'requisitoSeleccionado']);
        $this->abrir = false;

        $this->emit('requisitoGuardado');
        $this->dispatchBrowserEvent('guardado', ['message' => 'El documento fue enviado']);
    }

    private function solicitudActual()
    {
        $this->solicitud = SolicitudConvalidacion::query()
            ->whereHas('estudiante', function ($q) {
                $q->where('persona_id', auth()->user()->persona_id);
            })
            ->first();
    }

    private function requisitosFaltantes()
    {
        $this->requisitos = DB::table('requisitos')
            ->select('id', 'nombre')
            ->where('proceso_id', 16) // 16: Convalidación
            ->whereNotIn('id', function ($query) {
                $query->select('requisito_id')
                    ->from('documento_convalidacion')
                    ->whereIn('solicitud_convalidacion_id', function ($query2) {
                        $query2->select('id')
                            ->from('solicitud_convalidacion')
                            ->whereIn('estudiante_id', function ($query3) {
                                $query3->select('id')
                                    ->from('estudiantes')
                                    ->where('persona_id', auth()->user()->persona_id);
                            });
                    });
            })
            ->get();

        //        $this->requisitoSeleccionado = $this->requisitos[0]->id;
    }
}
