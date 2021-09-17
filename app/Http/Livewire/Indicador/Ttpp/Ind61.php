<?php

namespace App\Http\Livewire\Indicador\Ttpp;

use App\Models\AnalisisIndicador;
use App\Models\Grafico;
use App\Models\Ciclo;
use App\Models\Indicador;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Ind61 extends Component
{

    public $indicador, $mostrar = false, $fecha_medicion_inicio, $fecha_medicion_fin;

    public $min, $sat, $sob;

    public $interes, $total, $resultado, $guardar = false;

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

        $this->fecha_medicion_inicio = today()->subMonths($this->indicador->frecuencia->tiempo_meses)->format('Y-m-d');
        $this->fecha_medicion_fin = today()->format('Y-m-d');

        $this->calcularValor();
    }

    public function calcularValor()
    {
        /*    $today = date('Y-m-d'); //Hoy
        $from = date('Y-m-d', strtotime('-6 months', strtotime($today))); //Hace 6 meses */

        // Proyectos de investigación aprobados
        $this->interes = DB::table('sustentaciones')->select('1')
            ->join('declaraciones', 'declaraciones.id', '=', 'sustentaciones.declaracion_id')
            ->where('sustentaciones.escuela_id', $this->indicador->escuela_id)
            ->where('ciclo_id', $this->ciclo->id)
            ->where('declaraciones.name', 'Aprobado')
            ->count();

        // Proyectos de investigación presentados
        $this->total = DB::table('sustentaciones')->select('1')
            ->join('declaraciones', 'declaraciones.id', '=', 'sustentaciones.declaracion_id')
            ->where('sustentaciones.escuela_id', $this->indicador->escuela_id)
            ->where('ciclo_id', $this->ciclo->id)
            ->count();

        $this->resultado = $this->total === 0 ? 0 : round($this->interes / $this->total * 100);
    }

    public function enviarInformacion()
    {
        $datos = [
            'sobresaliente' => intval($this->sob),
            'satisfactorio' => intval($this->sat),
            'minimo' => intval($this->min),
            'bar' => intval($this->resultado),
            'label' => date("d-m-Y"),
            'color' => Grafico::getBarBackground($this->min, $this->sat, $this->sob, $this->resultado)
        ];

        $this->dispatchBrowserEvent('crearGrafico', ['dato' => $datos]);
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
            'interes' => $this->interes,
            'total' => $this->total,
            'resultado' => $this->resultado,
            'indicador_id' => $this->indicador->id,
        ]);

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

        $this->reset([
            'mostrar', 'guardar', 'elaborador',
            'revisador', 'aprobador', 'analisis', 'observaciones', 'verGrafico'
        ]);

        $this->emit('guardado', "Se guardó con éxito un nuevo análisis para el " . date("d-m-Y"));
        $this->emit('renderizarGrafico');
    }


    public function render()
    {
        $this->calcularValor();
        $this->enviarInformacion();
        return view('livewire.indicador.ttpp.ind61');
    }
}
