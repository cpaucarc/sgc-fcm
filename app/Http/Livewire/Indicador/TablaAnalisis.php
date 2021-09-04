<?php

namespace App\Http\Livewire\Indicador;

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
        return view('livewire.indicador.tabla-analisis');
    }
}
