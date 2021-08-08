<?php

namespace App\Http\Livewire\Rrss\Registro;

use App\Models\Docente;
use App\Models\Escuela;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use function Symfony\Component\VarDumper\Dumper\esc;

class ModalDocentes extends Component
{
    public $escuela;
    public $search;

    protected $listeners = [
        'enviarEscuela' => 'recibirEscuela'
    ];

    public function recibirEscuela($id)
    {
        $this->escuela = Escuela::find($id);
    }

    public function enviarDocente($id)
    {
        $this->emit('enviarDocente', Docente::find($id));
    }

    public function enviarDocenteParticante($id)
    {
        $this->emit('enviarDocenteParticante', Docente::find($id));
    }

    public function render()
    {
        if ($this->escuela) {
            $docentes = DB::table('docentes')
                ->select('docentes.id', 'personas.apellidos', 'personas.nombres', 'personas.dni', 'docentes.codigo')
                ->join('personas', 'personas.id', '=', 'docentes.persona_id')
                ->where('docentes.facultad_id', '=', $this->escuela->facultad->id)
                ->where(function ($query) {
                    return $query
                        ->where('docentes.escuela_id', '=', $this->escuela->id)
                        ->orWhereNull('docentes.escuela_id');
                })
                ->where(function ($query) {
                    return $query
                        ->where('personas.apellidos', 'like', $this->search . "%")
                        ->orWhere('personas.nombres', 'like', $this->search . "%")
                        ->orWhere('personas.dni', 'like', "%" . $this->search . "%");
                })
                ->orderBy('personas.apellidos')->limit(10)
                ->get();
        } else {
            $docentes = [];
        }

        return view('livewire.rrss.registro.modal-docentes', compact('docentes'));
    }
}
