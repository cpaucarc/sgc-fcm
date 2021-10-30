<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TituloProfesionalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function constancia($sha)
    {
        $estudiante = Estudiante::where(DB::raw('sha1(id)'), $sha)
            ->with('escuela')
            ->with('escuela.facultad')
            ->with('persona')
            ->with('solicitud.foto.documento:id,enlace_interno')
            ->limit(1)
            ->first();

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

        $pdf = PDF::loadView('ttpp.constancia_ttpp', compact('estudiante', 'director', 'decano'));
        return $pdf->stream();
        //    return $pdf->download('invoice.pdf');
    }

    public function estudiante($sha)
    {
        $estudiante = Estudiante::where(DB::raw('sha1(id)'), $sha)
            ->with('grados', 'persona', 'solicitud')
            ->first();
        return view('ttpp.estudiante', compact('estudiante'));
    }
    public function solicitudes()
    {
        //Lo verá solo la autoridad pertinente
        return view('ttpp.solicitudes');
    }
    public function solicitud()
    {
        //Lo verá solo el alumno
        return view('ttpp.solicitud');
    }
}
