<?php

namespace App\Http\Controllers;

use App\Models\Indicador;
use App\Models\ResponsabilidadSocial;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ResponsabilidadSocialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id = null)
    {

        if (is_null($id)) {

            //Si tiene rol Estudiante|Docente, debe ver sus propias RSU
            if (Auth::user()->hasRole(['Estudiante', 'Docente'])) {
                return view('rrss.responsables');
            }
            //Si no tiene rol Estudiante|Docente, debe ver todas las RSU
            return view('rrss.index');
        }

        $responsabilidad_social = ResponsabilidadSocial::query()
            ->with('ciclo', 'escuela', 'empresa', 'docente', 'estudiante', 'participantes_estudiantes', 'participantes_docentes', 'encuesta')
            ->withCount('participantes_estudiantes', 'participantes_docentes', 'documentos')
            ->where('id', $id)
            ->first();

        if ($responsabilidad_social) {
            return view('rrss.ver', compact('responsabilidad_social'));
        } else {
            return view('rrss.index');
        }
    }

    public function registro()
    {
        return view('rrss.registro');
    }

    public function editar($id)
    {
        $responsabilidad_social = ResponsabilidadSocial::find($id);
        if ($responsabilidad_social) {
            return view('rrss.editar', compact('responsabilidad_social'));
        } else {
            return view('rrss.index');
        }
    }

    public function empresas()
    {
        return view('rrss.empresas');
    }

}
