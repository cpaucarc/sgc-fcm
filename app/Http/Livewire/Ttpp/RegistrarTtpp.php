<?php

namespace App\Http\Livewire\Ttpp;

use App\Models\Asesor;
use App\Models\Bachiller;
use App\Models\BachillerTesis;
use App\Models\Ciclo;
use App\Models\Declaracion;
use App\Models\Docente;
use App\Models\Escuela;
use App\Models\Estudiante;
use App\Models\Jurado;
use App\Models\JuradoSustentacion;
use App\Models\Sustentacion;
use App\Models\Tesis;
use App\Models\TipoTesis;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class RegistrarTtpp extends Component
{
    public $numeroRegistro;
    public $titulo;
    public $anio;

    public $fechaSustentacion;
    public $ciclo;
    public $declaracion;
    public $tipoTesis;
    public $escuela;

    public $docenteAsesor = null;
    public $docenteJurado = null;
    public $estudianteBachiller = null;


    public $abrirDocenteAsesor = false;
    public $abrirDocenteJurado = false;
    public $abrirEstudianteBachiller = false;


    public $escuelas;
    public $declaraciones;
    public $tiposTesis;
    public $stn = null;
    public $ts = null;


    public $docJur = null;
    public $tesis_save = null;

    protected $listeners = [
        'enviarDocenteAsesor' => 'recibirDocenteAsesor',
        'enviarDocenteJurado' => 'recibirDocenteJurado',
        'enviarEstudianteBachiller' => 'recibirEstudianteBachiller',
    ];

    protected $rules = [
        'numeroRegistro' => 'required',
        'titulo' => 'required',
        'tipoTesis' => 'required|gt:0',
        'declaracion' => 'required|gt:0',
        'escuela' => 'required|gt:0',
    ];

    public function mount()
    {
        $facultad_id = (Auth::user()->roles)[0]->oficina->facultad_id;

        $this->escuelas = Escuela::where('facultad_id', $facultad_id)
            ->orderBy('nombre', 'asc')->get();

        $ciclos = Ciclo::all();
        $this->ciclo = $ciclos->filter(function ($c) {
            return ($c->fecha_fin >= Carbon::now() and $c->fecha_inicio <= Carbon::now());
        })->first();

        $this->declaraciones = Declaracion::orderBy('nombre', 'asc')->get();

        $this->tiposTesis = TipoTesis::orderBy('nombre', 'asc')->get();
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

    public function recibirEstudianteBachiller(Bachiller $bach)
    {
        $this->estudianteBachiller = $bach;
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

    public function registrarTTPP()
    {
        $this->validate();

        //Asesor

        if ($this->docenteAsesor) {
            Asesor::create([
                'docente_id' => $this->docenteAsesor->id,
            ]);
        }

        //Tesis
        $this->ts = Tesis::create([
            'numero_registro' => $this->numeroRegistro,
            'titulo' => $this->titulo,
            'anio' => $this->anio,
            'asesor_id' => $this->docenteAsesor->asesor->id,
            'tipo_tesis_id' => $this->tipoTesis,
        ]);

        $this->ts->save();

        $this->stn =  Sustentacion::create([
            'tesis_id' => $this->ts->id,
            'escuela_id' => $this->escuela,
            'ciclo_id' => $this->ciclo->id,
            'declaracion_id' => $this->declaracion,
        ]);

        if ($this->fechaSustentacion) {
            $this->stn->fecha_sustentacion = $this->fechaSustentacion;
        }

        if ($this->estudianteBachiller) {

            BachillerTesis::create([
                'bachiller_id' => $this->estudianteBachiller->id,
                'tesis_id' => $this->ts->id,
            ]);
        }

        if ($this->docenteJurado) {
            Jurado::create([
                'docente_id' => $this->docenteJurado->id,
            ]);

            JuradoSustentacion::create([
                'jurado_id' => $this->docenteJurado->jurado->id,
                'sustentacion_id' => $this->stn->id,
                'cargo_jurado_id' => '1'
            ]);
        }

        $this->stn->save();
        $this->reset(['numeroRegistro', 'titulo', 'tipoTesis', 'anio', 'fechaSustentacion', 'declaracion', 'escuela', 'docenteAsesor', 'estudianteBachiller', 'docenteJurado']);

        info("RegistrarTtpp: ttppId: " . $this->stn->id);
        $this->emit('enviarTTPP', $this->stn->id);
    }

    public function render()
    {
        return view('livewire.ttpp.registrar-ttpp');
    }
}
