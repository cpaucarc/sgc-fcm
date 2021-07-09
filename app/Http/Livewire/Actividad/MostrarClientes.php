<?php

namespace App\Http\Livewire\Actividad;

use App\Models\Salida;
use Livewire\Component;

class MostrarClientes extends Component
{
    public $open = false;
    public $salida = false;

    public function mount(Salida $salida)
    {
        $this->salida = $salida;
    }

    public function render()
    {
        return view('livewire.actividad.mostrar-clientes');
    }
}
