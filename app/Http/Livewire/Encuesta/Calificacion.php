<?php

namespace App\Http\Livewire\Encuesta;

use App\Models\RRSSEncuesta;
use App\Models\Pregunta;
use App\Models\ResponsabilidadSocial;
use App\Models\RRSSEncuestado;
use App\Models\RRSSRespuesta;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Calificacion extends Component
{
    public $calif = 0;
    public $encuesta, $pregunta, $i;

    protected $listeners = [
        'guardarFormulario' => 'guardarRespuesta'
    ];

    protected $rules = [
        'calif' => 'required|gt:0',
    ];

    public function mount(RRSSEncuesta $encuesta, $i, Pregunta $pregunta)
    {
        $this->encuesta = $encuesta;
        $this->i = $i;
        $this->pregunta = $pregunta;
    }

    public function asignar($num)
    {
        $this->calif = $num;
    }

    public function guardarRespuesta($encuestado)
    {
        $this->validate();

        DB::table('rrss_respuestas')->insert([
            'respuesta' => $this->calif,
            'pregunta_id' => $this->pregunta->id,
            'rrss_encuestado_id' => $encuestado,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);

        $this->emit('guardado');
    }

    public function render()
    {
        return view('livewire.encuesta.calificacion');
    }
}
