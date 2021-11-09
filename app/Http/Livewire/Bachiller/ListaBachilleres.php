<?php

namespace App\Http\Livewire\Bachiller;

use App\Models\Escuela;
use App\Models\GradoEstudiante;
use Livewire\Component;
use Livewire\WithPagination;

class ListaBachilleres extends Component
{
    use WithPagination;

    public $cantidad = 10;
    public $query = "";
    public $escuelas = null, $escuela_seleccionada = 1;

    public function mount()
    {
        $this->escuelas = Escuela::query()->orderBy('nombre')->get();
    }

    public function updatingQuery()
    {
        $this->resetPage();
    }

    public function updatingEscuelaSeleccionada()
    {
        $this->resetPage();
    }

    public function updatingCantidad()
    {
        $this->resetPage();
    }

    public function render()
    {
        $bachilleres = GradoEstudiante::query()
            ->with('estudiante')
            ->where('grado_academico_id', 3) //3:bachiller
            ->whereHas('estudiante', function ($query) {
                return $query
                    ->whereHas('persona', function ($query2) {
                        return $query2
                            ->where('nombres', 'like', '%' . $this->query . '%')
                            ->orWhere('apellidos', 'like', '%' . $this->query . '%');
                    })
                    ->where('escuela_id', $this->escuela_seleccionada);
            })
            ->orderBy('created_at', 'desc')
            ->paginate($this->cantidad);

        return view('livewire.bachiller.lista-bachilleres')
            ->with(compact('bachilleres'));
    }
}
