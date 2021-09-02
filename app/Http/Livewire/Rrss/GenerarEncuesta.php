<?php

namespace App\Http\Livewire\Rrss;

use App\Models\ResponsabilidadSocial;
use App\Models\RRSSEncuesta;
use Livewire\Component;

class GenerarEncuesta extends Component
{
    public $rsu;
    public $mostrar = false;
    public $mostrarLink = false;
    public $final, $link;

    protected $rules = [
        'final' => 'required'
    ];

    public function mount(ResponsabilidadSocial $rsu)
    {
        $this->rsu = $rsu;
    }

    public function generar()
    {
        $this->validate();

        $encuesta = RRSSEncuesta::create([
            'fecha_fin' => $this->final,
            'responsabilidad_social_id' => $this->rsu->id,
        ]);

        $this->link = route('encuesta.rrss', sha1($encuesta->id));

        $encuesta->link = $this->link;
        $encuesta->save();

        $this->mostrarLink = true;
    }

    public function render()
    {
        return view('livewire.rrss.generar-encuesta');
    }
}
