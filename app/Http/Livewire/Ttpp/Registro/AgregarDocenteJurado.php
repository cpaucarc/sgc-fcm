<?php

namespace App\Http\Livewire\Ttpp\Registro;

use App\Models\Docente;
use App\Models\Jurado;
use App\Models\JuradoSustentacion;
use App\Models\Sustentacion;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AgregarDocenteJurado extends Component
{

    public $ttpp = null;
    public $doc = null;
    public $abrir = false;
    public $cont = 0;

    protected $listeners = [
        'enviarDocenteJurado' => 'recibirDocenteJurado',
    ];
    public function mount($id)
    {
        $this->ttpp = Sustentacion::findOrFail($id);
    }

    public function abrirModal()
    {
        $this->emit('enviarEscuela', $this->ttpp->escuela_id);
        $this->abrir = true;
    }

    public function recibirDocenteJurado(Docente $dc)
    {
        if ($this->ttpp) {
            $this->doc = $dc;
            $this->cont = $this->cont + 1;
            if ($this->cont <= 2) {
                Jurado::create([
                    'docente_id' => $this->doc->id,
                ]);

                JuradoSustentacion::create([
                    'jurado_id' => $this->doc->jurado->id,
                    'sustentacion_id' => $this->ttpp->id,
                    'cargo_jurado_id' => $this->cont + 1,
                ]);
                $this->abrir = false;
            } else {
                $this->abrir = false;
            }
        }
    }

    public function eliminar($id)
    {
        /*   $juradoSus = JuradoSustentacion::findOrFail($id);
        if ($juradoSus) {
            $juradoSus->delete();
        }
        $jur = Jurado::findOrFail($juradoSus->jurado_id);
        if ($jur) {
            $jur->delete();
        }
        $this->cont = 0; */
    }


    public function render()
    {
        $docentes_participantes = DB::table('jurado_sustentacion')
            ->select('jurado_sustentacion.id', 'cargo_jurados.nombre as CargoJurado', 'docentes.codigo', 'personas.dni', 'personas.apellidos', 'personas.nombres')
            ->join('jurados', 'jurados.id', '=', 'jurado_sustentacion.jurado_id')
            ->join('cargo_jurados', 'cargo_jurados.id', '=', 'jurado_sustentacion.cargo_jurado_id')
            ->join('docentes', 'docentes.id', '=', 'jurados.docente_id')
            ->join('personas', 'personas.id', '=', 'docentes.persona_id')
            ->where('jurado_sustentacion.sustentacion_id', '=', $this->ttpp->id)
            ->whereNotNull('jurados.docente_id')
            ->orderBy('jurado_sustentacion.id', 'asc')
            ->get();

        return view('livewire.ttpp.registro.agregar-docente-jurado', compact('docentes_participantes'));
    }
}
