<?php

namespace App\Http\Livewire\Rrss\Indicador;

use App\Models\Indicador;
use Livewire\Component;

class Lista extends Component
{
    public $indicador;

    public function mount(Indicador $indicador)
    {
        $this->indicador = $indicador;
    }

    public function render()
    {
        return view('livewire.rrss.indicador.lista');
    }
}
