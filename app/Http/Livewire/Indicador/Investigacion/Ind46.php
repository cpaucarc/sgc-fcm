<?php

namespace App\Http\Livewire\Indicador\Investigacion;

use App\Models\AnalisisIndicador;
use App\Models\Ciclo;
use App\Models\Indicador;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Ind46 extends Component
{
    public $indicador, $mostrar = false, $ciclo;

    public $min, $sat, $sob;

    public $resultado, $guardar = false;

    public $elaborador, $revisador, $aprobador;

    public $analisis, $observaciones;

    public $verGrafico = false;

    protected $rules = [
        'min' => 'required',
        'sat' => 'required|gte:min',
        'sob' => 'required|gte:sat',
        'resultado' => 'required',
    ];

    public function mount(Indicador $indicador)
    {
        $this->indicador = $indicador;
        $this->min = $this->indicador->minimo;
        $this->sat = $this->indicador->satisfactorio;
        $this->sob = $this->indicador->sobresaliente;

        $this->ciclo = Ciclo::orderBy('id', 'desc')->first();
        $this->calcularValor();
    }

    public function calcularValor()
    {
        $today = date('Y-m-d'); //Hoy
        $from = date('Y-m-d', strtotime('-6 months', strtotime($today))); //Hace 6 meses

        //Datos por escuela
        $this->resultado = DB::table('investigaciones')->select('1')
            ->where('estado_id', 3) // Estado 3 es concluidos/publicados
            ->where('escuela_id', $this->indicador->escuela_id)
            ->whereRaw('date(created_at) between ? and ?', [$from, $today])
            ->count();
    }

    public function enviarInformacion()
    {
        $datos = [
            'sobresaliente' => intval($this->sob),
            'satisfactorio' => intval($this->sat),
            'minimo' => intval($this->min),
            'bar' => intval($this->resultado),
            'label' => date("d-m-Y"),
            'color' => $this->asignarColor($this->sob, $this->sat, $this->min, $this->resultado)
        ];

        $this->dispatchBrowserEvent('crearGrafico', ['dato' => $datos]);
    }

    private function asignarColor($sob, $sat, $min, $valor)
    {
        if ($valor <= $min) {
            return "#FDA4AF"; // Rojo - Tailwind: rose-300
        } elseif ($valor <= $sat) {
            return "#FCD34D"; // Rojo - Tailwind: amber-300
        } elseif ($valor <= $sob) {
            return "#86EFAC"; // Verde - Tailwind: green-300
        }
        return "#7DD3FC"; // Azul - Tailwind: sky-300
    }

    public function toggleGrafico()
    {
        $this->verGrafico = !$this->verGrafico;
    }

    public function guardarInstancia()
    {
        $this->validate();

        $analisis_indicador = AnalisisIndicador::create([
            'minimo' => $this->min,
            'satisfactorio' => $this->sat,
            'sobresaliente' => $this->sob,
            'resultado' => $this->resultado,
            'indicador_id' => $this->indicador->id
        ]);
        //, interes, total, ,

        if ($this->analisis) {
            $analisis_indicador->interpretacion = $this->analisis;
        }
        if ($this->observaciones) {
            $analisis_indicador->observacion = $this->observaciones;
        }
        if ($this->elaborador) {
            $analisis_indicador->elaborado_por = $this->elaborador;
        }
        if ($this->revisador) {
            $analisis_indicador->revisado_por = $this->revisador;
        }
        if ($this->aprobador) {
            $analisis_indicador->aprobado_por = $this->aprobador;
        }

        $analisis_indicador->save();

        if ($this->guardar) {
            $this->indicador->minimo = $this->min;
            $this->indicador->satisfactorio = $this->sat;
            $this->indicador->sobresaliente = $this->sob;
            $this->indicador->save();
        }

        $this->reset(['mostrar', 'guardar', 'elaborador',
            'revisador', 'aprobador', 'analisis', 'observaciones', 'verGrafico']);

        $this->emit('guardado', "Se guardo con éxito un nuevo análisis para el " . date("d-m-Y"));
        $this->emit('renderizarGrafico');
    }

    public function render()
    {
        $this->enviarInformacion();
        return view('livewire.indicador.investigacion.ind46');
    }

}
