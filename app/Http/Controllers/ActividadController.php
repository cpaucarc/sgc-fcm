<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use App\Models\ActividadCompleto;
use App\Models\Ciclo;

class ActividadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('actividad.index');
    }

    public function show($id, $ciclo)
    {
        $actividad = Actividad::query()
            ->addSelect(['estado' => ActividadCompleto::select('fecha_operacion')
                ->whereColumn('actividad_id', 'actividades.id')
                ->where('ciclo_id', $ciclo)
                ->limit(1)
            ])
            ->with('entradas', 'salidas', 'proceso', 'tipoActividad')
            ->where('id', $id)
            ->first();

        $c = Ciclo::find($ciclo);
        return view('actividad.mis-actividades')
            ->with(compact('actividad', 'c'));
    }
}
