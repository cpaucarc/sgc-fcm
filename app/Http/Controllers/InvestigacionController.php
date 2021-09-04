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

}
