<?php

namespace App\Http\Livewire\Ttpp;

use App\Models\Asesor;
use App\Models\Bachiller;
use App\Models\BachillerTesis;
use App\Models\Ciclo;
use App\Models\Declaracion;
use App\Models\Docente;
use App\Models\Escuela;
use App\Models\Jurado;
use App\Models\JuradoSustentacion;
use App\Models\Sustentacion;
use App\Models\Tesis;
use App\Models\TipoTesis;
use App\Models\Documento;
use App\Models\DocumentoTesis;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;


class RegistrarTtpp extends Component
{
    use WithFileUploads;

    public $numeroRegistro;
    public $titulo;
    public $anio;

    public $fechaSustentacion;
    public $ciclo;
    public $declaracion;
    public $tipoTesis;
    public $escuela;

    public $ciclo_sel = null;

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

    public $randomID;
    public $archivo;

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
        'archivo' => 'required',
    ];

    public function mount()
    {
        $facultad_id = (Auth::user()->trabajo)[0]->oficina->facultad_id;

        $this->escuelas = Escuela::where('facultad_id', $facultad_id)
            ->orderBy('nombre', 'asc')->get();

        $ciclos = Ciclo::all();
        $this->ciclo = $ciclos->filter(function ($c) {
            return ($c->fecha_fin >= Carbon::now() and $c->fecha_inicio <= Carbon::now());
        })->first();

        if (!$this->ciclo_sel) {
            $this->ciclo_sel = $ciclos->last();
        }

        $this->declaraciones = Declaracion::orderBy('nombre', 'asc')->get();

        $this->tiposTesis = TipoTesis::orderBy('nombre', 'asc')->get();

        $this->randomID = rand();
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

    public function enviarDocumentoTesis()
    {
        $this->validate();
        $rutaCarpeta = '/public/titulos';

        //verificar si existe la carpeta storage/app/public/salidas, crear si no existe
        if (!Storage::exists($rutaCarpeta)) {
            Storage::makeDirectory($rutaCarpeta);
        }

        //copiar archivo a la carpeta storage/app/public/salidas
        $nombreArchivo = $this->archivo->getClientOriginalName();
        if (!$nombreArchivo) {
            $nombreArchivo = "Archivo adjunto";
        }

        $existe = Storage::disk('public')->exists('titulos/' . $nombreArchivo);
        $num = 0;
        if ($existe) {
            $aux = $nombreArchivo;
            while ($existe) {
                $num++;
                $aux = $num . '_' . $aux;
                $existe = Storage::disk('public')->exists('titulos/' . $aux);
                $aux = $nombreArchivo;
            }
            $nombreArchivo = $num . '_' . $nombreArchivo;
        }

        $this->archivo->storeAs($rutaCarpeta, $nombreArchivo);

        $documento = Documento::create([
            'nombre' => $nombreArchivo,
            'enlace_interno' => 'titulos' . '/' . $nombreArchivo
        ]);

        DocumentoTesis::create([
            'documento_id' => $documento->id,
            'tesis_id' => $this->ts->id
        ]);

        //            $this->open = false;
        $this->randomID = rand();
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
            'numero_registro' => strtoupper($this->numeroRegistro),
            'titulo' => $this->titulo,
            'anio' => $this->anio,
            'asesor_id' => $this->docenteAsesor->asesor->id,
            'tipo_tesis_id' => $this->tipoTesis,
        ]);

        $this->ts->save();

        $this->stn = Sustentacion::create([
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
        $this->enviarDocumentoTesis();

        $this->reset(['numeroRegistro', 'titulo', 'tipoTesis', 'anio', 'fechaSustentacion', 'declaracion', 'escuela', 'docenteAsesor', 'estudianteBachiller', 'docenteJurado']);
        info("RegistrarTtpp: ttppId: " . $this->stn->id);
        $this->emit('enviarTTPP', $this->stn->id);
    }

    public function render()
    {
        return view('livewire.ttpp.registrar-ttpp');
    }
}
