<?php

namespace App\Http\Livewire\Investigacion;

use App\Models\Investigacion;
use App\Models\Investigador;
use Livewire\Component;
use Livewire\WithPagination;

class ListarInvestigaciones extends Component
{
    use WithPagination;

    public $cantidad = 10;
    public $buscar = '';
    public $sort = 'fecha_publicacion';
    public $direccion = 'desc';

    public function updatingBuscar()
    {
        $this->resetPage();
    }

    public function updatingCantidad()
    {
        $this->resetPage();
    }

    public function sortBy($sort)
    {
        if ($this->sort === $sort) {
            $this->direccion = $this->direccion === 'desc' ? 'asc' : 'desc';
        } else {
            $this->sort = $sort;
            $this->direccion = 'asc';
        }
    }

    public function render()
    {
        $investigaciones = Investigacion::query()
            ->where('titulo', 'like', '%' . $this->buscar . '%')
            ->orWhereYear('fecha_publicacion', 'like', '%' . $this->buscar . '%')
            ->orWhereHas('escuela', function ($query) {
                return $query->where('nombre', 'like', '%' . $this->buscar . '%');
            })
            ->orWhereHas('estado', function ($query) {
                return $query->where('nombre', 'like', '%' . $this->buscar . '%');
            })
            ->orderBy($this->sort, $this->direccion)
            ->paginate($this->cantidad);

        return view('livewire.investigacion.listar-investigaciones', compact('investigaciones'));
    }
}
