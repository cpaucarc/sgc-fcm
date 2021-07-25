<?php

namespace App\Http\Livewire\Actividad;

use App\Models\Actividad;
use App\Models\ActividadCompleto;
use App\Models\Ciclo;
use App\Models\Entrada;
use App\Models\Salida;
use Livewire\Component;

class MostrarActividad extends Component
{
    public $actividad = null;
    public $salida = null;
    public $entrada = null;
    public $open = false;
    public $openDoc = false;
    public $estado = false;
    public $completado;
    public $ciclo;

    public function mount(Actividad $actividad, Ciclo $ciclo)
    {
        $this->actividad = $actividad;
        $this->ciclo = $ciclo;
        // $this->estado = $this->actividad->estado;
    }

    public function abrirModal(Salida $salida)
    {
        $this->salida = $salida;
        $this->open = true;
    }

    public function abrirModalDoc(Entrada $entrada)
    {
        $this->entrada = $entrada;
        $this->openDoc = true;
    }

    public function completarActividad()
    {
//      fecha_operacion datetime
//      actividad_responsable_id bigint(20) UN
//      ciclo_id bigint(20) UN
//      documento_id

        ActividadCompleto::where('ciclo_id');


        $this->estado = !$this->estado;
        $this->actividad->estado = $this->estado;
        $this->actividad->save();
    }

    public function render()
    {
        return view('livewire.actividad.mostrar-actividad');
    }
}
