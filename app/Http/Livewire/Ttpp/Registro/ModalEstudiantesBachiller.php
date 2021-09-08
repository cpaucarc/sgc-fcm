<?php

namespace App\Http\Livewire\Ttpp\Registro;

use App\Models\Bachiller;
use App\Models\Escuela;
use App\Models\Estudiante;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ModalEstudiantesBachiller extends Component
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

    public function enviarEstudianteBachiller($id)
    {
        $this->emit('enviarEstudianteBachiller', Bachiller::find($id));
    }


    public function render()
    {
        if ($this->escuela) {
            $bachilleres = DB::table('bachilleres')
                ->select('bachilleres.id', 'estudiantes.codigo', 'personas.apellidos', 'personas.nombres', 'personas.dni')
                ->join('estudiantes', 'estudiantes.id', '=', 'bachilleres.estudiante_id')
                ->join('personas', 'personas.id', '=', 'estudiantes.persona_id')
                ->where('estudiantes.escuela_id', '=', $this->escuela->id)
                ->where(function ($query) {
                    return $query
                        ->where('personas.apellidos', 'like', $this->search . "%")
                        ->orWhere('personas.nombres', 'like', $this->search . "%")
                        ->orWhere('personas.dni', 'like', "%" . $this->search . "%");
                })
                ->orderBy('personas.apellidos')->limit(10)
                ->get();
        } else {
            $bachilleres = [];
        }
        return view('livewire.ttpp.registro.modal-estudiantes-bachiller', compact('bachilleres'));
    }
}
