<?php

namespace App\Http\Livewire\Rrss\Indicador;

use App\Models\AnalisisIndicador;
use App\Models\Ciclo;
use App\Models\Indicador;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Ind50 extends Component
{
    public $indicador, $mostrar = false, $ciclo;

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
        $this->calcularValor();
    }

    public function calcularValor()
    {
        if ($this->indicador->escuela_id) {
            //Datos por escuela
            $docentes = DB::table('participante_rrss')->select('docente_id')
                ->whereNotNull('docente_id')
                ->whereIn('docente_id', function ($query) {
                    $query->select('id')
                        ->from('docentes')
                        ->where('escuela_id', $this->indicador->escuela_id)
                        ->where('estado', 1);
                })
                ->whereIn('responsabilidad_social_id', function ($query) {
                    $today = date('Y-m-d'); //Hoy
                    $from = date('Y-m-d', strtotime('-6 months', strtotime($today))); //Hace 6 meses

                    $query->select('id')
                        ->from('responsabilidad_social')
                        ->whereBetween('fecha_inicio', [$from, $today]);
                })
                ->distinct()
                ->get();
            $this->interes = $docentes->count();

            $docentes_fac = DB::table('docentes')->select('id')
                ->where('escuela_id', $this->indicador->escuela_id)
                ->where('estado', 1)
                ->distinct()
                ->get();
            $this->total = $docentes_fac->count();
            /*            /*
                    # Docentes de enfermeria que participaron en RSU
                    select distinct docente_id from participante_rrss
                        where docente_id is not null
                        and docente_id in (select id from docentes where escuela_id = 1 and estado = 1)
                        and responsabilidad_social_id in (select id from responsabilidad_social where ciclo_id = 2);
                    # Total de docentes de enfermeria
                    select * from docentes where estado = 1 and escuela_id = 1;
                        */
        } else {
            //Datos de la facultad
            $docentes_rsu = DB::table('participante_rrss')->select('docente_id')
                ->whereNotNull('docente_id')
                ->whereIn('docente_id', function ($query) {
                    $query->select('id')
                        ->from('docentes')
                        ->whereIn('escuela_id', function ($q2) {
                            $q2->select('id')
                                ->from('escuelas')
                                ->where('facultad_id', $this->indicador->facultad_id);
                        })
                        ->where('estado', 1);
                })
                ->whereIn('responsabilidad_social_id', function ($query) {
                    $today = date('Y-m-d'); //Hoy
                    $from = date('Y-m-d', strtotime('-6 months', strtotime($today))); //Hace 6 meses

                    $query->select('id')
                        ->from('responsabilidad_social')
                        ->whereBetween('fecha_inicio', [$from, $today]);
                })
                ->distinct()
                ->get();
            $this->interes = $docentes_rsu->count();

            $docentes_fac = DB::table('docentes')->select('id')
                ->whereIn('escuela_id', function ($q2) {
                    $q2->select('id')
                        ->from('escuelas')
                        ->where('facultad_id', $this->indicador->facultad_id);
                })
                ->where('estado', 1)
                ->distinct()
                ->get();
            $this->total = $docentes_fac->count();
            /*
        # Docentes de FCM que participaron en RSU
        select distinct docente_id from participante_rrss
            where docente_id is not null
            and docente_id in (select id from docentes where escuela_id in (select id from escuelas where facultad_id = 1) and estado = 1)
            and responsabilidad_social_id in (select id from responsabilidad_social where ciclo_id = 2);
        # Total de docentes de FCM
        select * from docentes where estado = 1 and escuela_id in (select id from escuelas where facultad_id = 1);
            */
        }

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
            'interes' => $this->interes,
            'total' => $this->total,
            'resultado' => $this->resultado,
            'indicador_id' => $this->indicador->id,
            'ciclo_id' => 2 //ToDo: Borrar despues (la migracion se cambio a nullable())
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

        $this->reset(['mostrar', 'guardar', 'elaborador',
            'revisador', 'aprobador', 'analisis', 'observaciones', 'verGrafico']);

        $this->emit('guardado', "Se guardo con éxito un nuevo análisis para el " . date("d-m-Y"));
        $this->emit('renderizarGrafico');
    }

    public function render()
    {
        $this->enviarInformacion();
        return view('livewire.rrss.indicador.ind50');
    }
}
