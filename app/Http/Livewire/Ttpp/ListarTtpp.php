<?php

namespace App\Http\Livewire\Ttpp;

use App\Models\Ciclo;
use App\Models\Sustentacion;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class ListarTtpp extends Component
{

    use WithPagination;

    public $ciclos;
    public $ciclo_sel;

    public $abrir = false;
    public $cantidad = 10;
    public $search;
    public $sort = 'fecha_fin';
    public $sortf = 'fecha';
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


        $ttpp = Sustentacion::where('ciclo_id', $this->ciclo_sel->id)
            ->where('tesis_id', 'like', '%' . $this->search . '%')
            ->orderBy($this->sortf, $this->direction)
            ->paginate($this->cantidad);

        return view('livewire.ttpp.listar-ttpp')
        ->with(compact('ttpp'));
    }
}
