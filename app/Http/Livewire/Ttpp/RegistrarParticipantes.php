<?php

namespace App\Http\Livewire\Ttpp;

use App\Models\Jurado;
use App\Models\Sustentacion;
use Livewire\Component;

class RegistrarParticipantes extends Component
{

    public $ttpp = null;

    public function mount($ttpp_id)
    {
        $this->ttpp = Sustentacion::find($ttpp_id);
    }

    public function render()
    {
        return view('livewire.ttpp.registrar-participantes');
    }
}
