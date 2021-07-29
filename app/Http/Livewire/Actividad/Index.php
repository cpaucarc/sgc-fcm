<?php

namespace App\Http\Livewire\Actividad;

use Livewire\Component;

class Index extends Component
{
    public $show_mis_actividades = false;   // num = 1
    public $show_proveer = false;           // num = 2
    public $show_documentos_recibidos = false; // num = 3

    public function mount()
    {
//        $this->show_mis_actividades = true;
        $this->show_documentos_recibidos = true;
    }

    public function cambiarVista($num)
    {
        $this->resetear();
        switch ($num) {
            case 1:
                $this->show_mis_actividades = true;
                break;
            case 2:
                $this->show_proveer = true;
                break;
            case 3:
                $this->show_documentos_recibidos = true;
                break;
        }
    }

    public function resetear()
    {
        $this->reset([
            'show_mis_actividades',
            'show_proveer',
            'show_documentos_recibidos'
        ]);
    }

    public function render()
    {
        return view('livewire.actividad.index');
    }
}
