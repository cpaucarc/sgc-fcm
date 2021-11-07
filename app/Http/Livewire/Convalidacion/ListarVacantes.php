<?php

namespace App\Http\Livewire\Convalidacion;

use App\Models\Ciclo;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class ListarVacantes extends Component
{
    use WithPagination;

    public $ciclos;
    public $ciclo_sel;

    public $abrir = false;
    public $cantidad = 10;
    public $search;
    public $sort = 'ciclo';
    public $direction = 'desc';

    public function mount()
    {
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
        $vacantes = DB::table('convalidaciones')
            ->select('convalidaciones.id', 'convalidaciones.vacantes', 'convalidaciones.fecha_inicio', 'convalidaciones.fecha_fin', 'escuelas.nombre as escuela', 'ciclos.nombre as ciclo')
            ->join('escuelas', 'escuelas.id', '=', 'convalidaciones.escuela_id')
            ->join('ciclos', 'ciclos.id', '=', 'convalidaciones.ciclo_id')
            ->where('escuelas.nombre', 'like', '%' . $this->search . '%')
            ->where('ciclos.nombre', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->cantidad);
        return view('livewire.convalidacion.listar-vacantes', compact('vacantes'));
    }
}
