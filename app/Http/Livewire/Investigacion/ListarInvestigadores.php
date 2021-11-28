<?php

namespace App\Http\Livewire\Investigacion;

use App\Models\Escuela;
use App\Models\Investigador;
use Livewire\Component;
use Livewire\WithPagination;
use function Symfony\Component\VarDumper\Dumper\esc;

class ListarInvestigadores extends Component
{
    use WithPagination;

    public $cantidad = 12;
    public $buscar = '';
    public $escuela = 1;
    public $tipo = 1;

    public $investigador = null, $mostrar = false;

    public function updatingBuscar()
    {
        $this->resetPage();
    }

    public function updatingCantidad()
    {
        $this->resetPage();
    }

    public function updatingEscuela()
    {
        $this->resetPage();
    }

    public function updatingTipo()
    {
        $this->resetPage();
    }

    public function verInvestigador(Investigador $investigador)
    {
        $this->investigador = $investigador;
        $this->mostrar = true;
    }

    public function obtenerDocentes()
    {
        return Investigador::query()
            ->whereHas('docente', function ($query) {
                return $query->whereHas('persona', function ($query2) {
                    return $query2->where('nombres', 'like', '%' . $this->buscar . '%')
                        ->orWhere('apellidos', 'like', '%' . $this->buscar . '%');
                })->where('escuela_id', $this->escuela);
            })
            ->with('docente.persona', 'docente.escuela', 'categoria', 'grado')
            ->paginate($this->cantidad);
    }

    public function obtenerEstudiantes()
    {
        return Investigador::query()
            ->whereHas('estudiante', function ($query) {
                return $query->whereHas('persona', function ($query2) {
                    return $query2->where('nombres', 'like', '%' . $this->buscar . '%')
                        ->orWhere('apellidos', 'like', '%' . $this->buscar . '%');
                })->where('escuela_id', $this->escuela);
            })
            ->with('estudiante.persona', 'estudiante.escuela', 'categoria', 'grado')
            ->paginate($this->cantidad);
    }

    public function render()
    {
        $escuelas = Escuela::where('facultad_id', auth()->user()->trabajo[0]->oficina->facultad_id)->orderBy('nombre')->get();

        $investigadores = $this->tipo == 1 ? $this->obtenerDocentes() : $this->obtenerEstudiantes();

        return view('livewire.investigacion.listar-investigadores', compact('investigadores', 'escuelas'));
    }
}
