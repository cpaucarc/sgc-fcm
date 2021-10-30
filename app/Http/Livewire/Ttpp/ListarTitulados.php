<?php

namespace App\Http\Livewire\Ttpp;

use App\Models\GradoEstudiante;
use Livewire\Component;
use Livewire\WithPagination;

class ListarTitulados extends Component
{
    use WithPagination;

    public $cantidad = 10;
    public $query = "";
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

        if (!$this->ciclo_sel) {
            $this->ciclo_sel = $this->ciclos->last();
        }
    }

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
        $titulados = GradoEstudiante::query()
            ->where('grado_academico_id', 4) //4: Titulado
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

        return view('livewire.ttpp.listar-titulados', compact('titulados'));
    }
}
