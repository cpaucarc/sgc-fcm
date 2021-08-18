<?php

namespace App\Http\Livewire\Rrss\Indicador;

use App\Models\Indicador;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Lista extends Component
{
    public $indicador;
    public $mostrar = false;
    public $lista = array();

    public function mount(Indicador $indicador)
    {
        $this->indicador = $indicador;
        $this->consultar();
    }

    public function toggle()
    {
        $this->mostrar = !$this->mostrar;
    }

    public function consultar()
    {
        $facultad = $this->indicador->facultad;
        $lista_fac = DB::table('indicadores')
            ->select('id', 'cod_ind_inicial')
            ->whereNull('escuela_id')
            ->where('facultad_id', $facultad->id)
            ->orderBy('cod_ind_inicial')
            ->get();

        array_push($this->lista, array(
            "nombre" => $facultad->nombre,
            "items" => $lista_fac
        ));

        foreach ($facultad->escuelas as $escuela) {
            array_push($this->lista, array(
                "nombre" => $escuela->nombre,
                "items" => DB::table('indicadores')
                    ->select('id', 'cod_ind_inicial')
                    ->where('escuela_id', $escuela->id)
                    ->orderBy('cod_ind_inicial')
                    ->get()
            ));
        }

    }

    public function render()
    {
        return view('livewire.rrss.indicador.lista');
    }
}
