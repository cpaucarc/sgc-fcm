<?php

namespace App\Http\Livewire\Rrss\Registro;

use App\Models\Docente;
use App\Models\Estudiante;
use App\Models\ParticipanteRRSS;
use App\Models\ResponsabilidadSocial;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AgregarEstudianteParticipante extends Component
{
    public $rrss = null;
    public $est_part = null;
    public $abrir = false;

    protected $listeners = [
        'enviarEstudiante' => 'recibirEstudiante',
    ];

    public function mount($id)
    {
        $this->rrss = ResponsabilidadSocial::findOrFail($id);
    }

    public function abrirModal()
    {
        $this->emit('enviarEscuela', $this->rrss->escuela_id);
        $this->abrir = true;
    }

    public function recibirEstudiante(Estudiante $est)
    {
        if ($this->rrss) {
            $this->est_part = $est;
            ParticipanteRRSS::create([
                'fecha_incorporacion' => date('Y-m-d'),
                'responsabilidad_social_id' => $this->rrss->id,
                'estudiante_id' => $this->est_part->id
            ]);
            $this->abrir = false;
        }
    }

    public function eliminar($id)
    {
        $participante = ParticipanteRRSS::findOrFail($id);
        if ($participante) {
            $participante->delete();
        }
    }

    public function render()
    {
        $estudiantes_participantes = DB::table('participante_rrss')
            ->select('participante_rrss.id', 'participante_rrss.fecha_incorporacion', 'estudiantes.codigo', 'personas.dni', 'personas.apellidos', 'personas.nombres')
            ->join('estudiantes', 'estudiantes.id', '=', 'participante_rrss.estudiante_id')
            ->join('personas', 'personas.id', '=', 'estudiantes.persona_id')
            ->where('participante_rrss.responsabilidad_social_id', '=', $this->rrss->id)
            ->whereNotNull('participante_rrss.estudiante_id')
            ->orderBy('personas.apellidos')
            ->get();

        return view('livewire.rrss.registro.agregar-estudiante-participante', compact('estudiantes_participantes'));
    }
}
