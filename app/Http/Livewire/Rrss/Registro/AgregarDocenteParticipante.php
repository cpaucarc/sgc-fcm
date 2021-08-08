<?php

namespace App\Http\Livewire\Rrss\Registro;

use App\Models\Docente;
use App\Models\ParticipanteRRSS;
use App\Models\ResponsabilidadSocial;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AgregarDocenteParticipante extends Component
{
    public $rrss = null;
    public $doc_part = null;
    public $abrir = false;

    protected $listeners = [
        'enviarDocente' => 'recibirDocente',
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

    public function recibirDocente(Docente $dc)
    {
        if ($this->rrss) {
            $this->doc_part = $dc;
            ParticipanteRRSS::create([
                'fecha_incorporacion' => date('Y-m-d'),
                'responsabilidad_social_id' => $this->rrss->id,
                'docente_id' => $this->doc_part->id
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
        $docentes_participantes = DB::table('participante_rrss')
            ->select('participante_rrss.id', 'participante_rrss.fecha_incorporacion', 'docentes.codigo', 'personas.dni', 'personas.apellidos', 'personas.nombres')
            ->join('docentes', 'docentes.id', '=', 'participante_rrss.docente_id')
            ->join('personas', 'personas.id', '=', 'docentes.persona_id')
            ->where('participante_rrss.responsabilidad_social_id', '=', $this->rrss->id)
            ->whereNotNull('participante_rrss.docente_id')
            ->orderBy('personas.apellidos')
            ->get();

        return view('livewire.rrss.registro.agregar-docente-participante', compact('docentes_participantes'));
    }
}
