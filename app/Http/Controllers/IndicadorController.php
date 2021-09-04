<?php

namespace App\Http\Controllers;

use App\Models\Indicador;
use App\Models\Proceso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IndicadorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $procesos = Proceso::withCount('indicadores')->get();
        return view('indicador.index', compact('procesos'));
    }

    public function indicadores($id, $nombre)
    {
        $facultad = Auth::user()->roles[0]->oficina->facultad;
        $lista = array();

        $lista_fac = DB::table('indicadores')
            ->select('*')
            ->whereNull('escuela_id')
            ->where('facultad_id', $facultad->id)
            ->where('proceso_id', $id)
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
                    ->where('proceso_id', $id)
                    ->orderBy('cod_ind_inicial')
                    ->get()
            ));
        }

        return view('indicador.indicadores', compact('lista'));
    }

    public function indicador($id, $nombre)
    {
        $indicador = Indicador::findOrFail($id);
        $procesos = Proceso::withCount('indicadores')->get();
        return view('indicador.indicador', compact('indicador', 'procesos'));
    }
}
