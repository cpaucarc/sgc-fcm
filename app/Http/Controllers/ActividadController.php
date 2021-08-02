<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
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
        $actividad = Actividad::find($id);
        $c = Ciclo::find($ciclo);
        return view('actividad.mis-actividades')
            ->with(compact('actividad', 'c'));
    }
}
