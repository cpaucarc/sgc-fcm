<?php

namespace App\Http\Livewire\Ttpp\Registro;

use App\Models\Docente;
use App\Models\Escuela;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ModalDocenteAsesor extends Component
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

    public function enviarDocenteAsesor($id)
    {
        $this->emit('enviarDocenteAsesor', Docente::find($id));
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

        return view('livewire.ttpp.registro.modal-docente-asesor', compact('docentes'));
    }
}
