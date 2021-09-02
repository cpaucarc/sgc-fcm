<?php

namespace App\Http\Controllers;

use App\Models\Indicador;
use App\Models\Investigacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InvestigacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('investigacion.index');
    }

    public function mostrar($id)
    {
        $investigacion = Investigacion::find($id);
        return view('investigacion.mostrar', compact('investigacion'));
    }

    public function investigadores()
    {
        return view('investigacion.investigadores');
    }

    public function indicadores()
    {
        $proceso = 8;  //BD-Tabla: procesos: 9 -> Proy Investigacion
        $facultad = Auth::user()->roles[0]->oficina->facultad;
        $lista = array();

        foreach ($facultad->escuelas as $escuela) {
            array_push($lista, array(
                "nombre" => $escuela->nombre,
                "items" => DB::table('indicadores')
                    ->select('*')
                    ->where('escuela_id', $escuela->id)
                    ->where('proceso_id', $proceso)
                    ->orderBy('cod_ind_inicial')
                    ->get()
            ));
        }

        return view('indicador.investigacion.index', compact('lista'));
    }

    public function indicador($id)
    {
        if (!isset($id)) {
            return view('investigacion.index');
        }

        $indicador = Indicador::find($id);
        if ($indicador) {
            return view('indicador.investigacion.indicador', compact('indicador'));
        } else {
            return view('investigacion.index');
        }
    }
}
