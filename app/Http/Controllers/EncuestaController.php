<?php

namespace App\Http\Controllers;

use App\Models\Pregunta;
use App\Models\RRSSEncuesta;
use Illuminate\Support\Facades\DB;

class EncuestaController extends Controller
{
    public function rrss($sha)
    {
        $proceso = 9;

        $preguntas = Pregunta::where('proceso_id', $proceso)->get();

        $encuesta = RRSSEncuesta::where(DB::raw('sha1(id)'), $sha)
            ->limit(1)
            ->get();
        $encuesta = $encuesta[0];

        return view('rrss.encuesta', compact('sha', 'encuesta', 'preguntas'));
    }

    public function agradecimiento()
    {
        return view('encuestas.agradecimiento');
    }
}
