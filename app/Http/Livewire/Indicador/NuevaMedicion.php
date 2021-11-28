<?php

namespace App\Http\Livewire\Indicador;

use App\Models\AnalisisIndicador;
use App\Models\Grafico;
use App\Models\Indicador;
use App\Models\RRSSRespuesta;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class NuevaMedicion extends Component
{
    public $mostrar = false; // Mostrar u ocultar modal
    public $indicador;
    public $min, $sat, $sob;
    public $fecha_medicion_inicio, $fecha_medicion_fin, $diffInDays, $diffIsOk = true;
    public $interes = null, $total = null, $resultado;
    public $elaborador, $revisador, $aprobador;
    public $analisis, $observaciones;
    public $guardar = false; //Checkbox para saber si se va a guardar nuevos rangos de medida

    protected $rules = [
        'min' => 'required',
        'sat' => 'required|gte:min',
        'sob' => 'required|gte:sat',
        'resultado' => 'required',
    ];

    public function mount($indicador)
    {
        $this->indicador = Indicador::findOrFail($indicador);
        $this->min = $this->indicador->minimo;
        $this->sat = $this->indicador->satisfactorio;
        $this->sob = $this->indicador->sobresaliente;

        $this->fecha_medicion_inicio = today()->subMonths($this->indicador->frecuencia->tiempo_meses)->format('Y-m-d');
        $this->fecha_medicion_fin = today()->format('Y-m-d');
    }

    public function emitirEvento()
    {
        $this->emitTo(
            'indicador.grafico-unitario',
            'verGrafico',
            $this->min,
            $this->sat,
            $this->sob,
            $this->resultado
        );
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
            'fecha_medicion_inicio' => $this->fecha_medicion_inicio,
            'fecha_medicion_fin' => $this->fecha_medicion_fin
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

        $this->guardarNuevosRangosDeIndicador();

        $this->reset([
            'mostrar', 'guardar', 'elaborador', 'revisador', 'aprobador',
            'analisis', 'observaciones'
        ]);

        $this->emit('guardado', "Se creó con éxito un nuevo análisis para el rango de " . $this->fecha_medicion_inicio . " y " . $this->fecha_medicion_fin);
        $this->emit('renderizarGrafico');
    }

    public function guardarNuevosRangosDeIndicador()
    {
        if ($this->guardar) {
            $this->indicador->minimo = $this->min;
            $this->indicador->satisfactorio = $this->sat;
            $this->indicador->sobresaliente = $this->sob;
            $this->indicador->save();
        }
    }

    public function comprobarFechas()
    {
        $this->diffInDays = Carbon::parse($this->fecha_medicion_fin)->diffInDays($this->fecha_medicion_inicio);
        $frecuenciaEnDias = $this->indicador->frecuencia->tiempo_meses * 30;

        if ($frecuenciaEnDias === 180) { //Semestral
            $this->diffIsOk = $this->diffInDays > 185 || $this->diffInDays < 175 ? false : true;
        } elseif ($frecuenciaEnDias === 30) { //Mensual
            $this->diffIsOk = $this->diffInDays > 33 || $this->diffInDays < 27 ? false : true;
        }
    }

    private function calcularValoresDeMedicion()
    {
        $codigo = $this->indicador->cod_ind_inicial;

        if ($codigo === 'IND-024')
            $this->ind24();
        elseif ($codigo === 'IND-025')
            $this->ind25();
        elseif ($codigo === 'IND-026')
            $this->ind26();
        elseif ($codigo === 'IND-044')
            $this->ind44();
        elseif ($codigo === 'IND-045')
            $this->ind45();
        elseif ($codigo === 'IND-046')
            $this->ind46();
        elseif ($codigo === 'IND-047')
            $this->ind47();
        elseif ($codigo === 'IND-048')
            $this->ind48();
        elseif ($codigo === 'IND-049')
            $this->ind49();
        elseif ($codigo === 'IND-050')
            $this->ind50();
        elseif ($codigo === 'IND-051')
            $this->ind51();
        elseif ($codigo === 'IND-052')
            $this->ind52();
        elseif ($codigo === 'IND-053')
            $this->ind53();
        elseif ($codigo === 'IND-058')
            $this->ind58();
        elseif ($codigo === 'IND-059') {
            $this->ind59();
        } elseif ($codigo === 'IND-060') {
            $this->ind60();
        } elseif ($codigo === 'IND-061') {
            $this->ind61();
        }
    }

    public function render()
    {
        $this->comprobarFechas();
        $this->calcularValoresDeMedicion();
        return view('livewire.indicador.nueva-medicion');
    }

    //Todo: Al refactorizar, mejorar esta parte

    /*Indicadores de Convalidaciones*/
    public function ind24()
    {
        $this->interes = null;
        $this->total = null;

        $this->resultado = DB::table('convalidacion_estudiante')
            ->where('convalidacion_id', function ($query) {
                $query->select('id')
                    ->from('convalidaciones')
                    ->where('escuela_id', $this->indicador->escuela_id)
                    ->where('ciclo_id', function ($q) {
                        return $q->select('id')
                            ->from('ciclos')
                            ->whereBetween(DB::raw('fecha_inicio'), [$this->fecha_medicion_inicio, $this->fecha_medicion_fin])
                            ->orWhereBetween(DB::raw('fecha_fin'), [$this->fecha_medicion_inicio, $this->fecha_medicion_fin]);
                    });
            })
            ->count();

    }

    public function ind25()
    {
        $this->interes = null;
        $this->total = null;

        $this->resultado = (DB::table('convalidaciones')->select('vacantes')
            ->where('escuela_id', $this->indicador->escuela_id)
            ->where('ciclo_id', function ($query) {
                $query->select('id')
                    ->from('ciclos')
                    ->whereBetween(DB::raw('fecha_inicio'), [$this->fecha_medicion_inicio, $this->fecha_medicion_fin])
                    ->orWhereBetween(DB::raw('fecha_fin'), [$this->fecha_medicion_inicio, $this->fecha_medicion_fin]);
            })
            ->first())->vacantes;

    }


    public function ind26()
    {
        $this->interes = DB::table('convalidacion_estudiante')
            ->where('convalidacion_id', function ($query) {
                $query->select('id')
                    ->from('convalidaciones')
                    ->where('escuela_id', $this->indicador->escuela_id)
                    ->where('ciclo_id', function ($q) {
                        return $q->select('id')
                            ->from('ciclos')
                            ->whereBetween(DB::raw('fecha_inicio'), [$this->fecha_medicion_inicio, $this->fecha_medicion_fin])
                            ->orWhereBetween(DB::raw('fecha_fin'), [$this->fecha_medicion_inicio, $this->fecha_medicion_fin]);
                    });
            })
            ->count();

        $this->total = (DB::table('convalidaciones')->select('vacantes')
            ->where('escuela_id', $this->indicador->escuela_id)
            ->where('ciclo_id', function ($query) {
                $query->select('id')
                    ->from('ciclos')
                    ->whereBetween(DB::raw('fecha_inicio'), [$this->fecha_medicion_inicio, $this->fecha_medicion_fin])
                    ->orWhereBetween(DB::raw('fecha_fin'), [$this->fecha_medicion_inicio, $this->fecha_medicion_fin]);
            })
            ->first())->vacantes;;

        $this->resultado = $this->total === 0 ? 0 : round($this->interes / $this->total * 100);

    }

    /* Indicadores de Investigacion */
    private
    function ind44()
    {
        // Docentes que participan en PI por escuela
        $this->interes = DB::table('investigador_investigacion')->select('1')
            ->join('investigaciones', 'investigaciones.id', '=', 'investigador_investigacion.investigacion_id')
            ->join('investigadores', 'investigadores.id', '=', 'investigador_investigacion.investigador_id')
            ->join('docentes', 'docentes.id', '=', 'investigadores.docente_id')
            ->where('docentes.escuela_id', $this->indicador->escuela_id)
            ->whereBetween('investigaciones.fecha_publicacion', [$this->fecha_medicion_inicio, $this->fecha_medicion_fin])
            ->count();

        // Docentes activos por escuela
        $this->total = DB::table('docentes')->select('1')
            ->where('escuela_id', $this->indicador->escuela_id)
            ->where('estado', 1)
            ->count();

        $this->resultado = $this->total === 0 ? 0 : round($this->interes / $this->total * 100);
    }

    public
    function ind45()
    {
        // Docentes que participan en PI por escuela
        $this->interes = DB::table('investigador_investigacion')->select('1')
            ->join('investigaciones', 'investigaciones.id', '=', 'investigador_investigacion.investigacion_id')
            ->join('investigadores', 'investigadores.id', '=', 'investigador_investigacion.investigador_id')
            ->join('estudiantes', 'estudiantes.id', '=', 'investigadores.estudiante_id')
            ->where('estudiantes.escuela_id', $this->indicador->escuela_id)
            ->whereBetween('investigaciones.fecha_publicacion', [$this->fecha_medicion_inicio, $this->fecha_medicion_fin])
            ->count();

        // Docentes activos por escuela
        $this->total = DB::table('estudiantes')->select('1')
            ->where('escuela_id', $this->indicador->escuela_id)
            ->count();
        $this->resultado = $this->total === 0 ? 0 : round($this->interes / $this->total * 100);
    }

    public
    function ind46()
    {
        //Datos por escuela
        $this->interes = null;
        $this->total = null;
        $this->resultado = DB::table('investigaciones')->select('1')
            ->where('estado_id', 3) // Estado 3 es concluidos/publicados
            ->where('escuela_id', $this->indicador->escuela_id)
            ->whereRaw('date(created_at) between ? and ?', [$this->fecha_medicion_inicio, $this->fecha_medicion_fin])
            ->count();
    }

    public
    function ind47()
    {
        //Datos por escuela
        $this->interes = null;
        $this->total = null;
        $this->resultado = DB::table('investigaciones')->select('1')
            ->where('escuela_id', $this->indicador->escuela_id)
            ->whereBetween('created_at', [$this->fecha_medicion_inicio, $this->fecha_medicion_fin])
            ->count();
    }

    /* Indicadores de RSU */
    public
    function ind48()
    {
        $this->interes = null;
        $this->total = null;

        if ($this->indicador->escuela_id) {
            //Datos por escuela
            $this->resultado = DB::table('participante_rrss')->select('estudiante_id')
                ->whereNotNull('estudiante_id')
                ->whereIn('estudiante_id', function ($query) {
                    $query->select('id')
                        ->from('estudiantes')
                        ->where('escuela_id', $this->indicador->escuela_id);
                })
                ->whereIn('responsabilidad_social_id', function ($query) {
                    $query->select('id')
                        ->from('responsabilidad_social')
                        ->whereBetween('fecha_fin', [$this->fecha_medicion_inicio, $this->fecha_medicion_fin]);
                })
                ->distinct()
                ->count();
        } else {
            //Datos de la facultad
            $this->resultado = DB::table('participante_rrss')->select('estudiante_id')
                ->whereNotNull('estudiante_id')
                ->whereIn('estudiante_id', function ($query) {
                    $query->select('id')
                        ->from('estudiantes')
                        ->whereIn('escuela_id', function ($q2) {
                            $q2->select('id')
                                ->from('escuelas')
                                ->where('facultad_id', $this->indicador->facultad_id);
                        });
                })
                ->whereIn('responsabilidad_social_id', function ($query) {
                    $query->select('id')
                        ->from('responsabilidad_social')
                        ->whereBetween('fecha_fin', [$this->fecha_medicion_inicio, $this->fecha_medicion_fin]);
                })
                ->distinct()
                ->count();
        }
    }

    public
    function ind49()
    {
        $this->interes = null;
        $this->total = null;

        if ($this->indicador->escuela_id) {
            //Datos por escuela
            $this->resultado = DB::table('participante_rrss')->select('docente_id')
                ->whereNotNull('docente_id')
                ->whereIn('docente_id', function ($query) {
                    $query->select('id')
                        ->from('docentes')
                        ->where('escuela_id', $this->indicador->escuela_id)
                        ->where('estado', 1);
                })
                ->whereIn('responsabilidad_social_id', function ($query) {
                    $query->select('id')
                        ->from('responsabilidad_social')
                        ->whereBetween('fecha_fin', [$this->fecha_medicion_inicio, $this->fecha_medicion_fin]);
                })
                ->distinct()
                ->count();
        } else {
            //Datos de la facultad
            $this->resultado = DB::table('participante_rrss')->select('docente_id')
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
                    $query->select('id')
                        ->from('responsabilidad_social')
                        ->whereBetween('fecha_fin', [$this->fecha_medicion_inicio, $this->fecha_medicion_fin]);
                })
                ->distinct()
                ->count();
        }
    }

    public
    function ind50()
    {
        if ($this->indicador->escuela_id) {
            //Datos por escuela
            $this->interes = DB::table('participante_rrss')->select('docente_id')
                ->whereNotNull('docente_id')
                ->whereIn('docente_id', function ($query) {
                    $query->select('id')
                        ->from('docentes')
                        ->where('escuela_id', $this->indicador->escuela_id)
                        ->where('estado', 1);
                })
                ->whereIn('responsabilidad_social_id', function ($query) {
                    $query->select('id')
                        ->from('responsabilidad_social')
                        ->whereBetween('fecha_inicio', [$this->fecha_medicion_inicio, $this->fecha_medicion_fin]);
                })
                ->distinct()
                ->count();

            $this->total = DB::table('docentes')->select('id')
                ->where('escuela_id', $this->indicador->escuela_id)
                ->where('estado', 1)
                ->distinct()
                ->count();
        } else {
            //Datos de la facultad
            $this->interes = DB::table('participante_rrss')->select('docente_id')
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
                    $query->select('id')
                        ->from('responsabilidad_social')
                        ->whereBetween('fecha_inicio', [$this->fecha_medicion_inicio, $this->fecha_medicion_fin]);
                })
                ->distinct()
                ->count();

            $this->total = DB::table('docentes')->select('id')
                ->whereIn('escuela_id', function ($q2) {
                    $q2->select('id')
                        ->from('escuelas')
                        ->where('facultad_id', $this->indicador->facultad_id);
                })
                ->where('estado', 1)
                ->distinct()
                ->count();
        }
        $this->resultado = $this->total === 0 ? 0 : round($this->interes / $this->total * 100);
    }

    public
    function ind51()
    {
        if ($this->indicador->escuela_id) {
            //Datos por escuela
            $this->interes = DB::table('participante_rrss')->select('estudiante_id')
                ->whereNotNull('estudiante_id')
                ->whereIn('estudiante_id', function ($query) {
                    $query->select('id')
                        ->from('estudiantes')
                        ->where('escuela_id', $this->indicador->escuela_id);
                })
                ->whereIn('responsabilidad_social_id', function ($query) {
                    $query->select('id')
                        ->from('responsabilidad_social')
                        ->whereBetween('fecha_inicio', [$this->fecha_medicion_inicio, $this->fecha_medicion_fin]);
                })
                ->distinct()
                ->count();

            $this->total = DB::table('estudiantes')->select('id')
                ->where('escuela_id', $this->indicador->escuela_id)
                ->distinct()
                ->count();
        } else {
            //Datos de la facultad
            $this->interes = DB::table('participante_rrss')->select('estudiante_id')
                ->whereNotNull('estudiante_id')
                ->whereIn('estudiante_id', function ($query) {
                    $query->select('id')
                        ->from('estudiantes')
                        ->whereIn('escuela_id', function ($q2) {
                            $q2->select('id')
                                ->from('escuelas')
                                ->where('facultad_id', $this->indicador->facultad_id);
                        });
                })
                ->whereIn('responsabilidad_social_id', function ($query) {
                    $query->select('id')
                        ->from('responsabilidad_social')
                        ->whereBetween('fecha_inicio', [$this->fecha_medicion_inicio, $this->fecha_medicion_fin]);
                })
                ->distinct()
                ->count();

            $this->total = DB::table('estudiantes')->select('id')
                ->whereIn('escuela_id', function ($q2) {
                    $q2->select('id')
                        ->from('escuelas')
                        ->where('facultad_id', $this->indicador->facultad_id);
                })
                ->distinct()
                ->count();
        }
        $this->resultado = $this->total === 0 ? 0 : round($this->interes / $this->total * 100);
    }

    public
    function ind52()
    {
        $this->interes = null;
        $this->total = null;

        if ($this->indicador->escuela_id) {
            //Datos por escuela
            $this->resultado = DB::table('responsabilidad_social')->select('id')
                ->where('escuela_id', $this->indicador->escuela_id)
                ->whereBetween('fecha_inicio', [$this->fecha_medicion_inicio, $this->fecha_medicion_fin])
                ->distinct()
                ->count();
        } else {
            //Datos de la facultad
            $this->resultado = DB::table('responsabilidad_social')->select('id')
                ->whereIn('escuela_id', function ($query) {
                    $query->select('id')
                        ->from('escuelas')
                        ->where('facultad_id', $this->indicador->facultad_id);
                })
                ->whereBetween('fecha_inicio', [$this->fecha_medicion_inicio, $this->fecha_medicion_fin])
                ->distinct()
                ->count();
        }
    }

    public
    function ind53()
    {
        if ($this->indicador->escuela_id) {
            //Datos por escuela
            $respuestas = RRSSRespuesta::whereIn('rrss_encuestado_id', function ($q1) {
                $q1->select('id')
                    ->from('rrss_encuestados')
                    ->whereIn('rrss_encuesta_id', function ($q2) {
                        $q2->select('id')
                            ->from('rrss_encuestas')
                            ->whereIn('responsabilidad_social_id', function ($q3) {
                                $q3->select('id')
                                    ->from('responsabilidad_social')
                                    ->whereBetween('fecha_inicio', [$this->fecha_medicion_inicio, $this->fecha_medicion_fin])
                                    ->where('escuela_id', $this->indicador->escuela_id);
                            });
                    });
            })->get();

            $this->interes = ($respuestas->where('respuesta', '>', 3))->count();
            $this->total = $respuestas->count();

            $suma = 0;
            foreach ($respuestas as $respuesta) {
                $suma += $respuesta->respuesta;
            }
            $this->resultado = $this->total === 0 ? 0 : round($suma / ($this->total * 5) * 100);
        } else {
            //Datos de la facultad
            $respuestas = RRSSRespuesta::whereIn('rrss_encuestado_id', function ($q1) {
                $q1->select('id')
                    ->from('rrss_encuestados')
                    ->whereIn('rrss_encuesta_id', function ($q2) {
                        $q2->select('id')
                            ->from('rrss_encuestas')
                            ->whereIn('responsabilidad_social_id', function ($q3) {
                                $q3->select('id')
                                    ->from('responsabilidad_social')
                                    ->whereBetween('fecha_inicio', [$this->fecha_medicion_inicio, $this->fecha_medicion_fin])
                                    ->whereIn('escuela_id', function ($query) {
                                        $query->select('id')
                                            ->from('escuelas')
                                            ->where('facultad_id', $this->indicador->facultad_id);
                                    });
                            });
                    });
            })->get();

            $this->interes = ($respuestas->where('respuesta', '>', 3))->count();
            $this->total = $respuestas->count();

            $suma = 0;
            foreach ($respuestas as $respuesta) {
                $suma += $respuesta->respuesta;
            }
            $this->resultado = $this->total === 0 ? 0 : round($suma / ($this->total * 5) * 100);
        }
    }

    /* Indicador de Bachiller */
    public
    function ind58()
    {
        $egresados = DB::table('grado_estudiante')->select('estudiante_id', 'grado_academico_id')
            ->whereIn('estudiante_id', function ($query) {
                $query->select('estudiante_id')
                    ->from('grado_estudiante')
                    ->where('grado_academico_id', 2) //Grado Academico 2: Egresado
                    ->whereRaw('date(created_at) between ? and ?', [$this->fecha_medicion_inicio, $this->fecha_medicion_fin]);
            })
            ->get();

        $this->total = ($egresados->where('grado_academico_id', 2))->count();
        $this->interes = ($egresados->where('grado_academico_id', 3))->count();
        $this->resultado = $this->total === 0 ? 0 : round($this->interes / $this->total * 100);
    }

    /* Indicador de titulo profesional */
    public
    function ind59()
    {
        if ($this->indicador->escuela_id) {
            $bachilleres = DB::table('grado_estudiante')->select('estudiante_id', 'grado_academico_id')
                ->whereIn('estudiante_id', function ($query) {
                    $query->select('estudiante_id')
                        ->from('grado_estudiante')
                        ->where('grado_academico_id', 3) //Grado Academico 3: Bachiller
                        ->whereRaw('date(created_at) between ? and ?', [$this->fecha_medicion_inicio, $this->fecha_medicion_fin])
                        ->whereIn('estudiante_id', function ($query2) {
                            $query2->select('id')
                                ->from('estudiantes')
                                ->where('escuela_id', $this->indicador->escuela_id);
                        });
                })
                ->get();

            $this->total = ($bachilleres->where('grado_academico_id', 3))->count();
            $this->interes = ($bachilleres->where('grado_academico_id', 4))->count();
            $this->resultado = $this->total === 0 ? 0 : round($this->interes / $this->total * 100);
        }
    }

    public
    function ind60()
    {
        $this->interes = null;
        $this->total = null;
        if ($this->indicador->escuela_id) {
            $titulados = DB::table('grado_estudiante')->select('estudiante_id', 'grado_academico_id')
                ->whereIn('estudiante_id', function ($query) {
                    $query->select('estudiante_id')
                        ->from('grado_estudiante')
                        ->where('grado_academico_id', 4) //Grado Academico 4: Titulado
                        ->whereRaw('date(created_at) between ? and ?', [$this->fecha_medicion_inicio, $this->fecha_medicion_fin])
                        ->whereIn('estudiante_id', function ($query2) {
                            $query2->select('id')
                                ->from('estudiantes')
                                ->where('escuela_id', $this->indicador->escuela_id);
                        });
                })
                ->get();
        }
        $this->resultado = $titulados->where('grado_academico_id', 4)->count();;
    }

    public
    function ind61()
    {
        if ($this->indicador->escuela_id) {
            //Proyectos de investigación aprobados
            $this->interes = DB::table('sustentaciones')->select('id')
                ->where('escuela_id', $this->indicador->escuela_id)
                ->where('declaracion_id', '1')
                ->whereBetween('fecha_sustentacion', [
                    $this->fecha_medicion_inicio,
                    $this->fecha_medicion_fin
                ])
                ->distinct()
                ->count();

            //Proyectos de investigación
            $this->total = DB::table('sustentaciones')->select('id')
                ->where('escuela_id', $this->indicador->escuela_id)
                ->whereBetween('fecha_sustentacion', [
                    $this->fecha_medicion_inicio,
                    $this->fecha_medicion_fin
                ])
                ->distinct()
                ->count();
        }

        $this->resultado = $this->total === 0 ? 0 : round($this->interes / $this->total * 100);
    }
}
