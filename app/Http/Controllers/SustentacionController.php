<?php

namespace App\Http\Controllers;

use App\Models\Sustentacion;

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
}
