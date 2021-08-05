<?php

namespace App\Http\Livewire\Rrss;

use Livewire\Component;

class RegistrarRrss extends Component
{
    //id, , , , fecha_inicio, fecha_fin, ciclo_id, empresa_id, docente_responsable_id, estudiante_responsable_id, created_at, updated_at
    public $titulo;
    public $descripcion;
    public $lugar;


    public function render()
    {
        return view('livewire.rrss.registrar-rrss');
    }
}
