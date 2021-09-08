<?php

namespace App\Http\Livewire\Ttpp;

use Livewire\Component;

class ProcesoRegistrar extends Component
{
    public $paso1 = true; //Registrar ttpp
    public $paso2 = false; //Registrar participantes ttpp
    public $ttpp_id = 0;

    protected $listeners = [
        'enviarTTPP' => 'recibirTTPP',
    ];

    public function recibirTTPP($id)
    {
        $this->ttpp_id = $id;
        $this->paso1 = false;
        $this->paso2 = true;
    }


    public function render()
    {
        return view('livewire.ttpp.proceso-registrar');
    }
}
