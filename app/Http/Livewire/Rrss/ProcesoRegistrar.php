<?php

namespace App\Http\Livewire\Rrss;

use App\Models\ResponsabilidadSocial;
use Livewire\Component;

class ProcesoRegistrar extends Component
{
    public $paso1 = true; //Registrar RRSS
    public $paso2 = false; //Registrar participantes RRSS
    public $rrss_id = 0;
//    public $rrss_id = 0;

    protected $listeners = [
        'enviarRRSS' => 'recibirRRSS',
    ];

    public function recibirRRSS($id)
    {
        $this->rrss_id = $id;
        $this->paso1 = false;
        $this->paso2 = true;
    }

    public function render()
    {
        return view('livewire.rrss.proceso-registrar');
    }
}
