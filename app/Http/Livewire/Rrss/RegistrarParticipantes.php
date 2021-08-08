<?php

namespace App\Http\Livewire\Rrss;

use App\Models\ResponsabilidadSocial;
use Livewire\Component;

class RegistrarParticipantes extends Component
{
    public $rrss = null;

    public function mount($rrss_id)
    {
        $this->rrss = ResponsabilidadSocial::find($rrss_id);
//        $this->rrss = ResponsabilidadSocial::find(62);
    }

    public function render()
    {
        return view('livewire.rrss.registrar-participantes');
    }
}
