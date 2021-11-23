<?php

namespace App\Http\Livewire\Rrss;

use App\Models\Ciclo;
use App\Models\Docente;
use App\Models\Empresa;
use App\Models\Escuela;
use App\Models\Estudiante;
use App\Models\ParticipanteRRSS;
use App\Models\ResponsabilidadSocial;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RegistrarRrss extends Component
{
    public $titulo;
    public $descripcion;
    public $lugar;
    public $fecha_inicio;
    public $fecha_fin;
    public $escuela;
    public $ciclo;

    public $empresa = null;
    public $docente = null;
    public $estudiante = null;

    public $abrirEmpresa = false;
    public $abrirDocente = false;
    public $abrirEstudiante = false;

    public $escuelas;
    public $rrss = null;

    protected $listeners = [
        'enviarEmpresa' => 'recibirEmpresa',
        'enviarDocente' => 'recibirDocente',
        'enviarEstudiante' => 'recibirEstudiante',
    ];

    protected $rules = [
        'titulo' => 'required',
        'lugar' => 'required',
        'fecha_inicio' => 'required',
        'fecha_fin' => 'required',
        'escuela' => 'required|gt:0',
    ];

    public function mount()
    {
        $facultad_id = (Auth::user()->trabajo)[0]->oficina->facultad_id;
        $this->escuelas = Escuela::where('facultad_id', $facultad_id)
            ->orderBy('nombre', 'asc')->get();

        $this->ciclo = Ciclo::orderBy('id', 'desc')->first()->id;
    }

    public function updatedEscuela()
    {
        $this->docente = null;
        $this->estudiante = null;
    }

    public function recibirEmpresa(Empresa $emp)
    {
        $this->empresa = $emp;
        $this->abrirEmpresa = false;
    }

    public function nullEmpresa()
    {
        $this->empresa = null;
    }

    public function abrirModalDocente()
    {
        $this->emit('enviarEscuela', $this->escuela);
        $this->abrirDocente = true;
    }

    public function recibirDocente(Docente $dc)
    {
        $this->docente = $dc;
        $this->abrirDocente = false;
    }

    public function nullDocente()
    {
        $this->docente = null;
    }

    public function abrirModalEstudiante()
    {
        $this->emit('enviarEscuela', $this->escuela);
        $this->abrirEstudiante = true;
    }

    public function recibirEstudiante(Estudiante $est)
    {
        $this->estudiante = $est;
        $this->abrirEstudiante = false;
    }

    public function nullEstudiante()
    {
        $this->estudiante = null;
    }

    public function registrarRRSS()
    {
        $this->validate();

        $this->rrss = ResponsabilidadSocial::create([
            'titulo' => $this->titulo,
            'lugar' => $this->lugar,
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_fin' => $this->fecha_fin,
            'ciclo_id' => $this->ciclo,
            'escuela_id' => $this->escuela, //id
        ]);

        if ($this->descripcion) {
            $this->rrss->descripcion = $this->descripcion;
        }

        if ($this->empresa) {
            $this->rrss->empresa_id = $this->empresa->id;
        }

        if ($this->docente) {
            $this->rrss->docente_responsable_id = $this->docente->id;

            ParticipanteRRSS::create([
                'fecha_incorporacion' => date('Y-m-d'),
                'responsabilidad_social_id' => $this->rrss->id,
                'docente_id' => $this->docente->id
            ]);
        }

        if ($this->estudiante) {
            $this->rrss->estudiante_responsable_id = $this->estudiante->id;

            ParticipanteRRSS::create([
                'fecha_incorporacion' => date('Y-m-d'),
                'responsabilidad_social_id' => $this->rrss->id,
                'estudiante_id' => $this->estudiante->id
            ]);
        }

        $this->rrss->save();
        $this->reset(['titulo', 'lugar', 'fecha_inicio', 'fecha_fin', 'escuela', 'descripcion', 'empresa', 'docente', 'estudiante']);
        info("RegistrarRrss: rrssId: " . $this->rrss->id);
        $this->emit('enviarRRSS', $this->rrss->id);

    }

    public function render()
    {
        return view('livewire.rrss.registrar-rrss');
    }
}
