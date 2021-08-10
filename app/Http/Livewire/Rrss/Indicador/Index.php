<?php

namespace App\Http\Livewire\Rrss\Indicador;

use Livewire\Component;

class Index extends Component
{
    public $facultad_id = 1;
    public $escuela_id = 0;
    public $facultad = false;   // num = 1
    public $show_proveer = false; // num = 2
    public $show_documentos_recibidos = false; // num = 3

    public function mount()
    {
        $this->show_mis_actividades = true;
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
        return view('livewire.rrss.indicador.index');
    }
}
