<?php

namespace App\Http\Controllers;

use App\Models\Asesor;
use App\Models\Sustentacion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SustentacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id = null)
    {
        if (is_null($id)) {
            return view('ttpp.index');
        }
        $sustentaciones = Sustentacion::find($id);
        if ($sustentaciones) {
            return view('ttpp.ver', compact('sustentaciones'));
        } else {
            return view('ttpp.index');
        }
    }
    public function registro()
    {
        return view('ttpp.registro');
    }

    public function titulados()
    {
        return view('ttpp.titulados');
    }
    public function asesores($id = null)
    {
        if (is_null($id)) {
            return view('ttpp.asesores');
        }
        $asesores = Asesor::find($id);
        if ($asesores) {
            return view('ttpp.verAsesorados', compact('asesores'));
        } else {
            return view('ttpp.asesores');
        }
    }
}
