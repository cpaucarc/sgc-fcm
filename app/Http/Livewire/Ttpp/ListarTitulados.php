<?php

namespace App\Http\Livewire\Ttpp;

use App\Models\Ciclo;
use App\Models\Sustentacion;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class ListarTitulados extends Component
{
    use WithPagination;

    public $ciclos;
    public $ciclo_sel;

    public $cantidad = 10;
    public $search;
    public $dcl = 'Aprobado';
    public $sort = 'fecha_sustentacion';
    public $direction = 'desc';

    public function mount()
    {
        $this->ciclo_sel = new Ciclo();
        $this->ciclos = Ciclo::orderBy('nombre', 'asc')->get();
        $this->ciclo_sel = $this->ciclos->filter(function ($c) {
            return ($c->fecha_fin >= Carbon::now() and $c->fecha_inicio <= Carbon::now());
        })->first();
    }

    public function setCiclo(Ciclo $ciclo)
    {
        $this->ciclo_sel = $ciclo;
    }

    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingCantidad()
    {
        $this->resetPage();
    }

    public function render()
    {

        $ttds = DB::table('bachilleres')
            ->select('bachilleres.id', 'tesis.numero_registro', 'tesis.titulo', 'sustentaciones.fecha_sustentacion', 'declaraciones.nombre as declaracion', 'sustentaciones.ciclo_id', 'escuelas.nombre as escuela', 'estudiantes.codigo', 'personas.apellidos', 'personas.nombres')
            ->join('bachiller_tesis', 'bachiller_tesis.bachiller_id', '=', 'bachilleres.id')
            ->join('tesis', 'tesis.id', '=', 'bachiller_tesis.tesis_id')
            ->join('sustentaciones', 'sustentaciones.tesis_id', '=', 'tesis.id')
            ->join('declaraciones', 'declaraciones.id', '=', 'sustentaciones.declaracion_id')
            ->join('escuelas', 'escuelas.id', '=', 'sustentaciones.escuela_id')
            ->join('estudiantes', 'estudiantes.id', '=', 'bachilleres.estudiante_id')
            ->join('personas', 'personas.id', '=', 'estudiantes.persona_id')
            ->where('sustentaciones.ciclo_id', $this->ciclo_sel->id)
            ->where('declaraciones.nombre', $this->dcl)
            ->where('estudiantes.codigo', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->cantidad);

        return view('livewire.ttpp.listar-titulados', compact('ttds'));
    }
}
