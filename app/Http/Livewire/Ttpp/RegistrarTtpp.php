<?php

namespace App\Http\Livewire\Ttpp;

use App\Models\Ciclo;
use App\Models\Declaracion;
use App\Models\Docente;
use App\Models\Empresa;
use App\Models\Escuela;
use App\Models\Estudiante;
use App\Models\ParticipanteRRSS;
use App\Models\ResponsabilidadSocial;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class RegistrarTtpp extends Component
{
    public $numeroRegistro;
    public $titulo;
    public $anio;

    public $fecha;
    public $ciclo;
    public $escuela;
    public $declaracion;

    public $docenteAsesor = null;
    public $docenteJurado = null;
    public $estudianteBachiller = null;


    public $abrirDocenteAsesor = false;
    public $abrirDocenteJurado = false;
    public $abrirEstudianteBachiller = false;


    public $escuelas;
    public $ciclos;
    public $declaraciones;
    public $ttpp = null;

    protected $listeners = [
        'enviarDocenteAsesor' => 'recibirDocenteAsesor',
        'enviarDocenteJurado' => 'recibirDocenteJurado',
        'enviarEstudianteBachiller' => 'recibirEstudianteBachiller',
    ];

    protected $rules = [
        'numeroRegistro' => 'required',
        'titulo' => 'required',
        'anio' => 'required',
        'declaracion' => 'required',
        'escuela' => 'required|gt:0',
    ];

    public function mount()
    {
        $facultad_id = (Auth::user()->roles)[0]->oficina->facultad_id;
        $this->escuelas = Escuela::where('facultad_id', $facultad_id)
            ->orderBy('nombre', 'asc')->get();

        $this->ciclos = Ciclo::orderBy('nombre', 'asc')->get();
        $this->declaraciones = Declaracion::orderBy('nombre', 'asc')->get();
    }

    public function updatedEscuela()
    {
        $this->docenteAsesor = null;
        $this->docenteJurado = null;
        $this->estudianteBachiller = null;
    }

    // Docente Asesor
    public function abrirModalDocenteAsesor()
    {
        $this->emit('enviarEscuela', $this->escuela);
        $this->abrirDocenteAsesor = true;
    }

    public function recibirDocenteAsesor(Docente $dc)
    {
        $this->docenteAsesor = $dc;
        $this->abrirDocenteAsesor = false;
    }

    public function nullDocenteAsesor()
    {
        $this->docenteAsesor = null;
    }

    // Estudiante Bachiller

    public function abrirModalEstudianteBachiller()
    {
        $this->emit('enviarEscuela', $this->escuela);
        $this->abrirEstudianteBachiller = true;
    }

    public function recibirEstudianteBachiller(Estudiante $es)
    {
        $this->estudianteBachiller = $es;
        $this->abrirEstudianteBachiller = false;
    }

    public function nullEstudianteBachiller()
    {
        $this->estudianteBachiller = null;
    }

    // Docente Jurado
    public function abrirModalDocenteJurado()
    {
        $this->emit('enviarEscuela', $this->escuela);
        $this->abrirDocenteJurado = true;
    }

    public function recibirDocenteJurado(Docente $dc)
    {
        $this->docenteJurado = $dc;
        $this->abrirDocenteJurado = false;
    }

    public function nullDocenteJurado()
    {
        $this->docenteJurado = null;
    }

    public function render()
    {
        return view('livewire.ttpp.registrar-ttpp');
    }
}
