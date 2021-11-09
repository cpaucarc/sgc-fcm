<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConvalidacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //!Si es administrador o encargado
        return view('convalidacion.index');
    }
    public function solicitudes()
    {
        //Lo verá solo el alumno
        return view('convalidacion.solicitudes');
    }
    public function solicitud()
    {
        //Lo verá solo el alumno
        return view('convalidacion.solicitud');
    }
    public function vacantes()
    {
        //Lo verá solo el alumno
        return view('convalidacion.vacantes');
    }
    public function registro()
    {
        //Lo verá solo el alumno
        return view('convalidacion.registro');
    }
}
