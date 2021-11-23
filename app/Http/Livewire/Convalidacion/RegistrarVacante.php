<?php

namespace App\Http\Livewire\Convalidacion;


use App\Models\Ciclo;
use App\Models\Convalidacion;
use App\Models\Escuela;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RegistrarVacante extends Component
{
    public $vacantes;
    public $fechaInicio;
    public $fechaFin;
    public $ciclo;
    public $escuela;

    public $escuelas;
    public $ciclos;
    public $convalidaciones = null;

    protected $rules = [
        'vacantes' => 'required',
        'fechaInicio' => 'required',
        'fechaFin' => 'required',
        'ciclo' => 'required|gt:0',
        'escuela' => 'required|gt:0',
    ];

    public function mount()
    {
        $facultad_id = (Auth::user()->trabajo)[0]->oficina->facultad_id;

        $this->escuelas = Escuela::where('facultad_id', $facultad_id)
            ->orderBy('nombre', 'asc')->get();

        $this->ciclos = Ciclo::all();

        $this->randomID = rand();
    }
    public function registrarVACANTES()
    {
        $this->validate();

        $this->convalidaciones = Convalidacion::create([
            'vacantes' => $this->vacantes,
            'fecha_inicio' => $this->fechaInicio,
            'fecha_fin' => $this->fechaFin,
            'ciclo_id' => $this->ciclo,
            'escuela_id' => $this->escuela,
        ]);

        $this->convalidaciones->save();

        $this->reset(['vacantes', 'fechaInicio', 'fechaFin', 'ciclo', 'escuela']);

    }

    public function render()
    {
        return view('livewire.convalidacion.registrar-vacante');
    }

}
