<?php

namespace App\Http\Livewire\Admin\Otros;

use Livewire\Component;

class Control extends Component
{
    public $mostrar_escuelas = false;   // num = 1
    public $mostrar_facultades = false; // num = 2

    public function mount()
    {
        $num = 1;
        $this->cambiarVista($num);
    }

    public function cambiarVista($num)
    {
        $this->resetear();
        switch ($num) {
            case 1:
                $this->mostrar_escuelas = true;
                break;
            case 2:
                $this->mostrar_facultades = true;
                break;
            default:
                $this->mostrar_escuelas = true;
        }
    }

    public function resetear()
    {
        $this->reset([
            'mostrar_escuelas',
            'mostrar_facultades'
        ]);
    }

    public function render()
    {
        return view('livewire.admin.otros.control');
    }
}
