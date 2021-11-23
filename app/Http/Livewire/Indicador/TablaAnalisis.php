<?php

namespace App\Http\Livewire\Indicador;

use App\Models\AnalisisIndicador;
use App\Models\Indicador;
use Livewire\Component;

class TablaAnalisis extends Component
{
    public $indicador;
    public $abrir = false, $abrirEditar = false, $analisis_seleccionado = null;

    public $analisis_a_editar = null;
    public $minimo = null, $satisfactorio = null, $sobresaliente = null;
    public $interpretacion = null, $observacion = null;
    public $elaborado_por = null, $revisado_por = null, $aprobado_por = null;

    protected $listeners = [
        'renderizarGrafico' => 'render'
    ];

    public function mount(Indicador $indicador)
    {
        $this->indicador = $indicador;
    }

    public function verAnalisis($analisis_id)
    {
        $this->analisis_seleccionado = AnalisisIndicador::query()
            ->with('indicador:id,objetivo,titulo_interes,titulo_total,titulo_resultado')
            ->where('id', $analisis_id)
            ->first();
        $this->abrir = true;
    }

    public function editarAnalisis($analisis_id)
    {
        $this->analisis_a_editar = AnalisisIndicador::query()
            ->where('id', $analisis_id)
            ->first();

        $this->minimo = $this->analisis_a_editar->minimo;
        $this->satisfactorio = $this->analisis_a_editar->satisfactorio;
        $this->sobresaliente = $this->analisis_a_editar->sobresaliente;

        $this->interpretacion = $this->analisis_a_editar->interpretacion;
        $this->observacion = $this->analisis_a_editar->observacion;

        $this->elaborado_por = $this->analisis_a_editar->elaborado_por;
        $this->revisado_por = $this->analisis_a_editar->revisado_por;
        $this->aprobado_por = $this->analisis_a_editar->aprobado_por;

        $this->abrirEditar = true;
    }

    public function guardarAnalisisEditado()
    {
        $this->analisis_a_editar->minimo = $this->minimo;
        $this->analisis_a_editar->satisfactorio = $this->satisfactorio;
        $this->analisis_a_editar->sobresaliente = $this->sobresaliente;
        $this->analisis_a_editar->interpretacion = $this->interpretacion;
        $this->analisis_a_editar->observacion = $this->observacion;
        $this->analisis_a_editar->elaborado_por = $this->elaborado_por;
        $this->analisis_a_editar->revisado_por = $this->revisado_por;
        $this->analisis_a_editar->aprobado_por = $this->aprobado_por;
        $this->analisis_a_editar->updated_at = now();
        $this->analisis_a_editar->save();

        $this->abrirEditar = false;
        $this->analisis_a_editar = null;
    }

    public function render()
    {
        return view('livewire.indicador.tabla-analisis');
    }
}
