<?php

namespace App\Http\Livewire\Ttpp;

use Livewire\Component;

class ProcesoRegistrar extends Component
{
    public $paso1 = true; //Registrar RRSS
    public $paso2 = false; //Registrar participantes RRSS
    public $ttpp_id = 0;

    protected $listeners = [
        'enviarTTPP' => 'recibirTTPP',
    ];

    public function recibirTTPP($id)
    {
        $this->rrss_id = $id;
        $this->paso1 = false;
        $this->paso2 = true;
    }


    public function render()
    {
        return view('livewire.ttpp.proceso-registrar');
    }
}