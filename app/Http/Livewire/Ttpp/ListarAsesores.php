<?php

namespace App\Http\Livewire\Ttpp;

use App\Models\Asesor;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;


class ListarAsesores extends Component
{
    use WithPagination;


    public $abrir = false;
    public $cantidad = 10;
    public $search;
    public $sort = 'nombres';
    public $direction = 'desc';

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

        /* $asesores = DB::table('asesores')
            ->select('asesores.id', 'asesores.cip', 'docentes.codigo', 'escuelas.nombre as escuela', 'personas.apellidos', 'personas.nombres', count('tesis.numero_registro'))
            ->join('docentes', 'docentes.id', '=', 'asesores.docente_id')
            ->join('personas', 'personas.id', '=', 'docentes.persona_id')
            ->join('escuelas', 'escuelas.id', '=', 'docentes.escuela_id')
            ->join('tesis', 'tesis.asesor_id', '=', 'asesores.id')
            ->where('personas.nombres', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->cantidad); */


        $asesores = Asesor::query()
            ->whereHas('docente', function ($query) {
                return $query->whereHas('persona', function ($query2) {
                    return $query2->where('nombres', 'like', '%' . $this->search . '%')
                        ->orWhere('apellidos', 'like', '%' . $this->search . '%');
                });
            })->paginate($this->cantidad);;



        return view('livewire.ttpp.listar-asesores', compact('asesores'));
    }
}
