<?php

namespace App\Http\Livewire\Ttpp;

use App\Models\Asesor;
use App\Models\Sustentacion;
use Livewire\Component;
use Livewire\WithPagination;


class ListarAsesores extends Component
{
    use WithPagination;


    public $abrir = false;
    public $cantidad = 10;
    public $search;
    public $sort = 'nombres';
    public $direction = 'desc';

    public $_asesor = null, $mostrar = false;

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

    public function verProyectos(Asesor $asr)
    {
        $this->_asesor = $asr;
        $this->mostrar = true;
    }

    public function render()
    {
        $asesores = Asesor::query()
            ->whereHas('docente', function ($query) {
                return $query->whereHas('persona', function ($query2) {
                    return $query2->where('nombres', 'like', '%' . $this->search . '%')
                        ->orWhere('apellidos', 'like', '%' . $this->search . '%');
                });
            })->paginate($this->cantidad);

        return view('livewire.ttpp.listar-asesores', compact('asesores'));
    }
}
