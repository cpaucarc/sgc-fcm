<?php

namespace App\Http\Livewire\Admin\Otros;

use Livewire\Component;

class Control extends Component
{
    public $mostrar_escuelas = false;   // num = 1
    public $mostrar_facultades = false; // num = 2
    public $mostrar_entradas = false; // num = 3
    public $mostrar_salidas = false; // num = 4
    public $mostrar_actividades = false; // num = 5

    public function mount()
    {
        $num = 5;
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
            case 3:
                $this->mostrar_entradas = true;
                break;
            case 4:
                $this->mostrar_salidas = true;
                break;
            case 5:
                $this->mostrar_actividades = true;
                break;
            default:
                $this->mostrar_escuelas = true;
        }
    }

    public function resetear()
    {
        $this->reset([
            'mostrar_escuelas',
            'mostrar_facultades',
            'mostrar_entradas',
            'mostrar_salidas',
            'mostrar_actividades',
        ]);
    }

    public function render()
    {
        return view('livewire.admin.otros.control');
    }
}
