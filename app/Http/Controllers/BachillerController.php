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
        $pdf = PDF::loadView('bachiller.constancia_bachiller', compact('estudiante'));
//    return $pdf->download('invoice.pdf');
        return $pdf->stream();
    }
}
