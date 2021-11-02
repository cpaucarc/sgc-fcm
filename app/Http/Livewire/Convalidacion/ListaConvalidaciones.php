<?php

namespace App\Http\Livewire\Convalidacion;

use App\Models\Convalidacion;
use App\Models\ConvalidacionEstudiante;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class ListaConvalidaciones extends Component
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
        $convalidaciones = $bachilleres = ConvalidacionEstudiante::query()
            ->where('convalidacion_id', (Convalidacion::query()
                ->where('fecha_fin', '>=',  Carbon::now())
                ->where('fecha_inicio', '<=',  Carbon::now())->first())->id)
            ->with('estudiante')
            ->whereHas('estudiante', function ($query) {
                return $query
                    ->whereIn('estudiante_id', function ($query) {
                        $query->select('estudiante_id')
                            ->from('solicitud_convalidacion')
                            ->where('estado_id', 3); //Grado Academico 4: Titulado
                    });
            })
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
        return view('livewire.convalidacion.lista-convalidaciones')->with(compact('convalidaciones'));
    }
}
