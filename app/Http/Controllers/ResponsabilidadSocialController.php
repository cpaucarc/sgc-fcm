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

}
