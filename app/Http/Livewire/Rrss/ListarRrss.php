<?php

namespace App\Http\Livewire\Rrss;

use App\Models\Ciclo;
use App\Models\ResponsabilidadSocial;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class ListarRrss extends Component
{
    use WithPagination;

    public $ciclos;
    public $ciclo_sel;

    public $abrir = false;
    public $cantidad = 10;
    public $search;
    public $sort = 'fecha_fin';
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

        $rrss = ResponsabilidadSocial::where('ciclo_id', $this->ciclo_sel->id)
            ->where('titulo', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->cantidad);

        return view('livewire.rrss.listar-rrss')
            ->with(compact('rrss'));
    }
}
