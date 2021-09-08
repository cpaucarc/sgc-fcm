<?php

namespace App\Http\Livewire\Ttpp\Registro;

use App\Models\Bachiller;
use App\Models\BachillerTesis;
use App\Models\Sustentacion;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AgregarEstudianteTesista extends Component
{

    public $ttpp = null;
    public $bach = null;
    public $abrir = false;

    protected $listeners = [
        'enviarEstudianteBachiller' => 'recibirEstudianteBachiller',
    ];

    public function mount($id)
    {
        $this->ttpp = Sustentacion::findOrFail($id);
    }

    public function abrirModal()
    {
        $this->emit('enviarEscuela', $this->ttpp->escuela_id);
        $this->abrir = true;
    }

    public function recibirEstudianteBachiller(Bachiller $bachi)
    {
        if ($this->ttpp) {
            $this->bach = $bachi;
            BachillerTesis::create([
                'bachiller_id' => $this->bach->id,
                'tesis_id' => $this->ttpp->tesis->id
            ]);
            $this->abrir = false;
        }
    }
    public function eliminar($id)
    {
        $participante = BachillerTesis::findOrFail($id);
        if ($participante) {
            $participante->delete();
        }
    }

    public function render()
    {
        $estudiantes_participantes = DB::table('bachiller_tesis')
            ->select('bachiller_tesis.id', 'bachilleres.id', 'tesis.id', 'estudiantes.codigo', 'personas.dni', 'personas.apellidos', 'personas.nombres')
            ->join('bachilleres', 'bachilleres.id', '=', 'bachiller_tesis.bachiller_id')
            ->join('estudiantes', 'estudiantes.id', '=', 'bachilleres.estudiante_id')
            ->join('personas', 'personas.id', '=', 'estudiantes.persona_id')
            ->join('tesis', 'tesis.id', '=', 'bachiller_tesis.tesis_id')
            ->where('tesis.id', '=', $this->ttpp->tesis->id)
            ->whereNotNull('bachilleres.estudiante_id')
            ->orderBy('personas.apellidos')
            ->get();
        return view('livewire.ttpp.registro.agregar-estudiante-tesista', compact('estudiantes_participantes'));
    }
}
