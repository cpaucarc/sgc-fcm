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

    public function indicadores()
    {
        $proceso = 9;  //BD-Tabla: procesos: 9 -> Responsabilidad Social
        $indicadores = Indicador::where('proceso_id', '=', 9)->get();
        $facultad = Auth::user()->roles[0]->oficina->facultad;
        $lista = array();

        $lista_fac = DB::table('indicadores')
            ->select('*')
            ->whereNull('escuela_id')
            ->where('facultad_id', $facultad->id)
            ->orderBy('cod_ind_inicial')
            ->get();

        array_push($lista, array(
            "nombre" => $facultad->nombre,
            "items" => $lista_fac
        ));

        foreach ($facultad->escuelas as $escuela) {
            array_push($lista, array(
                "nombre" => $escuela->nombre,
                "items" => DB::table('indicadores')
                    ->select('*')
                    ->where('escuela_id', $escuela->id)
                    ->orderBy('cod_ind_inicial')
                    ->get()
            ));
        }

        return view('rrss.indicadores', compact('lista'));
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
