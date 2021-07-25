<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use App\Models\Ciclo;
use Illuminate\Http\Request;

class ActividadController extends Controller
{
    public function index()
    {
        return view('actividad.index');
    }

    public function create()
    {
        //vista principal de actividades
    }

    public function show($id, $ciclo)
    {
        $actividad = Actividad::find($id);
        $c = Ciclo::find($ciclo);
//        if ($actividad) {
        return view('actividad.mis-actividades')
            ->with(compact('actividad', 'c'));
//        } else {
//            return redirect()->route('contratos');
//        }
    }
}
