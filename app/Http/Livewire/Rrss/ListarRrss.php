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

    public $ciclos = null, $ciclo_sel = 1;

    public $abrir = false;
    public $cantidad = 10, $search = '';
    public $sort = 'fecha_fin', $direction = 'desc';

    public function mount()
    {
        $this->ciclos = Ciclo::orderBy('nombre', 'asc')->get();
        $this->ciclo_sel = $this->ciclos->last()->id;
    }

//    public function setCiclo(Ciclo $ciclo)
//    {
//        $this->ciclo_sel = $ciclo;
//    }

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
        $rrss = ResponsabilidadSocial::query()
            ->with('escuela', 'empresa')
            ->where('ciclo_id', $this->ciclo_sel)
            ->where('titulo', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->cantidad);

        return view('livewire.rrss.listar-rrss')
            ->with(compact('rrss'));
    }
}
