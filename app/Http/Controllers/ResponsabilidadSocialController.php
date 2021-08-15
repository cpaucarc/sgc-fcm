<?php

namespace App\Http\Controllers;

use App\Models\Indicador;
use App\Models\ResponsabilidadSocial;

class ResponsabilidadSocialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id = null)
    {
        if (is_null($id)) {
            return view('rrss.index');
        }
        $responsabilidad_social = ResponsabilidadSocial::find($id);
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

    public function indicadores()
    {
        //procesos: 9 - Responsabilidad Social
        $indicadores = Indicador::where('proceso_id', '=', 9)->get();
        return view('rrss.indicadores', compact('indicadores'));
    }

    public function indicador($id)
    {
        if (!isset($id)) {
            return view('rrss.index');
        }

        $indicador = Indicador::find($id);
        if ($indicador) {
            return view('rrss.indicador', compact('indicador'));
        } else {
            return view('rrss.index');
        }
    }
}
