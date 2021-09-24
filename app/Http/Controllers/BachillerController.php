<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\GradoAcademico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BachillerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $estudiantes = GradoAcademico::with('bachilleres')
            ->with('bachilleres.escuela:id,nombre')
            ->with('bachilleres.persona')
            ->with('bachilleres.gradoReciente')
            ->with('bachilleres.solicitud.foto.documento:id,enlace_interno')
            ->where('id', 3)
            ->get();

        $estudiantes = $estudiantes[0];
        return view('bachiller.index', compact('estudiantes'));
    }

    public function constancia($sha)
    {
        $estudiante = Estudiante::where(DB::raw('sha1(id)'), $sha)
            ->with('escuela')
            ->with('escuela.facultad')
            ->with('persona')
            ->with('solicitud.foto.documento:id,enlace_interno')
            ->limit(1)
            ->get();
        $estudiante = $estudiante[0];

        $escuela = $estudiante->escuela;

        $director = DB::table('personas')
            ->select('personas.id as id', 'personas.apellidos as apellidos', 'personas.nombres as nombres')
            ->join('users', 'users.persona_id', '=', 'personas.id')
            ->join('roles', 'roles.user_id', '=', 'users.id')
            ->join('oficinas', 'oficinas.id', '=', 'roles.oficina_id')
            ->where('roles.entidad_id', 1) //   1: Direccion de escuela
            ->where('oficinas.nivel_oficina_id', 3) //3: Nivel Escuela
            ->where('oficinas.escuela_id', $escuela->id)
            ->orderBy('users.created_at', 'desc')
            ->limit(1)
            ->get();
        $director = $director->count() ? $director[0]->apellidos . ' ' . $director[0]->nombres : ' ';

        $decano = DB::table('personas')
            ->select('personas.id as id', 'personas.apellidos as apellidos', 'personas.nombres as nombres')
            ->join('users', 'users.persona_id', '=', 'personas.id')
            ->join('roles', 'roles.user_id', '=', 'users.id')
            ->join('oficinas', 'oficinas.id', '=', 'roles.oficina_id')
            ->where('roles.entidad_id', 5) //   5: Decano
            ->where('oficinas.nivel_oficina_id', 2) //3: Nivel Escuela
            ->where('oficinas.facultad_id', $escuela->facultad->id)
            ->orderBy('users.created_at', 'desc')
            ->limit(1)
            ->get();
        $decano = $decano->count() ? $decano[0]->apellidos . ' ' . $decano[0]->nombres : ' ';

        $pdf = PDF::loadView('bachiller.constancia_bachiller', compact('estudiante', 'director', 'decano'));
        return $pdf->stream();
//    return $pdf->download('invoice.pdf');
    }

    public function estudiante($sha)
    {
        $estudiante = Estudiante::where(DB::raw('sha1(id)'), $sha)
            ->with('grados')
            ->with('persona')
            ->with('solicitud')
            ->get();
        $estudiante = $estudiante[0];

        return view('bachiller.estudiante', compact('estudiante'));
    }

}
