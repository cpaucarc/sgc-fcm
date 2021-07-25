<?php

namespace App\Http\Livewire\Registro;

use App\Models\Entidad;
use App\Models\Escuela;
use App\Models\Facultad;
use App\Models\NivelEntidad;
use App\Models\Oficina;
use Livewire\Component;

class Registrar extends Component
{


    public function render()
    {
        $niveles = NivelEntidad::get();
        return view('livewire.registro.registrar')
            ->with(compact('niveles'));
    }
}
