<?php

namespace App\Http\Livewire\Ttpp\Solicitud;

use App\Models\Documento;
use App\Models\DocumentoSolicitudTitulo;
use App\Models\Estudiante;
use App\Models\SolicitudTitulo;
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
        return view('livewire.ttpp.solicitud.enviar-requisito');
    }
    public function guardarDocumento()
    {
        $this->validate();

        //Si no hay solicitud, se crea (estado 1:en evaluacion)
        if (is_null($this->solicitud)) {
            $this->solicitud = SolicitudTitulo::create([
                'estudiante_id' => (Estudiante::query()
                    ->where('persona_id', auth()->user()->persona_id)->first())->id,
                'estado_id' => 1,
            ]);
            $this->emit('solicitudCreado');
        }

        //Guardar en Documentos
        //sgc-fcm\storage\app\public\solicitud\bachiller\documento.pdf
        $rutaCarpeta = '/public/solicitud/titulos';
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
            'enlace_interno' => 'solicitud/titulos/' . $nombreFinal
        ]);

        //Guardar en documento_solicitud_bachiller
        DocumentoSolicitudTitulo::create([
            'solicitud_titulo_id' => $this->solicitud->id,
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
        $this->solicitud = SolicitudTitulo::query()
            ->whereHas('estudiante', function ($q) {
                $q->where('persona_id', auth()->user()->persona_id);
            })
            ->first();
    }

    private function requisitosFaltantes()
    {
        $this->requisitos = DB::table('requisitos')
            ->select('id', 'nombre')
            ->where('proceso_id', 5) // 12: Bachiller
            ->whereNotIn('id', function ($query) {
                $query->select('requisito_id')
                    ->from('documento_solicitud_titulo')
                    ->whereIn('solicitud_titulo_id', function ($query2) {
                        $query2->select('id')
                            ->from('solicitud_titulo')
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
