<?php

namespace App\Http\Livewire\Indicador;

use App\Models\Grafico;
use Livewire\Component;

class GraficoUnitario extends Component
{
    public $min, $sat, $sob, $resultado;
    public $mostrar = false;

    public $listeners = [
        'verGrafico'
    ];

    public function verGrafico($min = 0, $sat = 0, $sob = 0, $resultado = 0)
    {
        $this->min = $min;
        $this->sat = $sat;
        $this->sob = $sob;
        $this->resultado = $resultado;
        $this->mostrar = true;
        $this->enviarInformacion();
    }

//    public function toggle()
//    {
//        $this->mostrar = !$this->mostrar;
//        if ($this->mostrar){
//            $this->enviarInformacion();
//        }
//    }

    public function enviarInformacion()
    {
        $datos = [
            'sobresaliente' => intval($this->sob),
            'satisfactorio' => intval($this->sat),
            'minimo' => intval($this->min),
            'bar' => intval($this->resultado),
            'label' => date("d-m-Y"),
            'color' => Grafico::getBarBackground($this->min, $this->sat, $this->sob, $this->resultado)
        ];

        $this->dispatchBrowserEvent('mostrarGrafico', ['dato' => $datos]);
    }

    public function render()
    {
//        $this->enviarInformacion();
        return view('livewire.indicador.grafico-unitario');
    }
}
