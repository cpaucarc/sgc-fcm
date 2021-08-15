<?php

namespace App\Http\Livewire\Rrss\Indicador;

use App\Models\Indicador;
use Livewire\Component;

class TablaAnalisis extends Component
{
    public $indicador;

    protected $listeners = [
        'renderizarGrafico' => 'render'
    ];

    public function mount(Indicador $indicador)
    {
        $this->indicador = $indicador;
    }

    public function render()
    {
        return view('livewire.rrss.indicador.tabla-analisis');
    }
}
