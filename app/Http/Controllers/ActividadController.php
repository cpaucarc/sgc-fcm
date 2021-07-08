<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
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

    public function show($id)
    {
        $actividad = Actividad::find($id);
//        if ($actividad) {
        return view('actividad.mis-actividades')
            ->with(compact('actividad'));
//        } else {
//            return redirect()->route('contratos');
//        }
    }
}
