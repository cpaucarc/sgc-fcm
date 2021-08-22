<?php

namespace App\Http\Livewire\Encuesta;

use App\Models\RRSSEncuesta;
use App\Models\RRSSEncuestado;
use Livewire\Component;

class Formulario extends Component
{
    public $encuesta, $preguntas;
    public $nombre, $correo;

    public $encuestado = null;
    public $preguntas_guardados = 0;

    protected $listeners = [
        'guardado'
    ];

    protected $rules = [
        'nombre' => 'required',
        'correo' => 'required|email',
    ];

    public function mount(RRSSEncuesta $encuesta, $preguntas)
    {
        $this->encuesta = $encuesta;
        $this->preguntas = $preguntas;
        $this->encuestado = new RRSSEncuestado();
    }

    public function guardarEncuesta()
    {
        $this->validate();

        $this->encuestado = RRSSEncuestado::create([
            'nombre_encuestado' => $this->nombre,
            'correo_encuestado' => $this->correo,
            'rrss_encuesta_id' => $this->encuesta->id,
        ]);

        $this->emit('guardarFormulario', $this->encuestado->id);

    }

    public function guardado()
    {
        $this->preguntas_guardados++;
        if($this->preguntas_guardados === $this->preguntas->count()){
            $this->redirect(route('encuesta.agradecimiento'));
        }
    }


    public function render()
    {
        return view('livewire.encuesta.formulario');
    }
}
