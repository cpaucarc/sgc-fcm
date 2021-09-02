<?php

namespace App\Http\Livewire\Ttpp;

use App\Models\Ciclo;
use App\Models\Sustentacion;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class ListarTtpp extends Component
{

    use WithPagination;

    public $ciclos;
    public $ciclo_sel;

    public $abrir = false;
    public $cantidad = 10;
    public $search;
    public $sort = 'fecha';
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
        /* $ttpp = Sustentacion::where('ciclo_id', $this->ciclo_sel->id)
            ->where('tesis_id', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->cantidad); */

        $ttpp = DB::table('sustentaciones')
            ->select('sustentaciones.id', 'sustentaciones.fecha', 'tesis.numero_registro', 'tesis.titulo', 'tesis.anio', 'escuelas.nombre', 'personas.apellidos', 'personas.nombres', 'declaraciones.nombre')
            ->join('tesis', 'tesis.id', '=', 'sustentaciones.tesis_id')
            ->join('asesores', 'asesores.id', '=', 'tesis.asesor_id')
            ->join('docentes', 'docentes.id', '=', 'asesores.docente_id')
            ->join('personas', 'personas.id', '=', 'docentes.persona_id')
            ->join('escuelas', 'escuelas.id', '=', 'sustentaciones.escuela_id')
            ->join('declaraciones', 'declaraciones.id', '=', 'sustentaciones.declaracion_id')
            ->where('ciclo_id', $this->ciclo_sel->id)
            ->where('tesis.numero_registro', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->cantidad);

        return view('livewire.ttpp.listar-ttpp', compact('ttpp'));
    }
}
