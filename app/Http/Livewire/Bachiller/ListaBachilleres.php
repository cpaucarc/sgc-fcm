<?php

namespace App\Http\Livewire\Bachiller;

use App\Models\GradoAcademico;
use App\Models\GradoEstudiante;
use Livewire\Component;
use Livewire\WithPagination;

class ListaBachilleres extends Component
{
    use WithPagination;

    public $cantidad = 10;
    public $query = "";

    public function updatingQuery()
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
            ->where('grado_academico_id', 3) //3:bachiller
            ->with('estudiante')
            ->whereHas('estudiante', function ($query) {
                return $query
                    ->whereHas('persona', function ($query2) {
                        return $query2
                            ->where('nombres', 'like', '%' . $this->query . '%')
                            ->orWhere('apellidos', 'like', '%' . $this->query . '%');
                    })
                    ->orWhereHas('escuela', function ($query3) {
                        return $query3
                            ->where('nombre', 'like', '%' . $this->query . '%');
                    });
            })
            ->orderBy('created_at', 'desc')
            ->paginate($this->cantidad);

        return view('livewire.bachiller.lista-bachilleres')
            ->with(compact('bachilleres'));
    }
}
