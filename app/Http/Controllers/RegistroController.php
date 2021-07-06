<?php

namespace App\Http\Controllers;

use App\Models\Oficina;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
    public function index()
    {
        $oficinas = Oficina::orderBy('nombre')->get();
        return view('auth.registro')
            ->with(compact('oficinas'));
    }
}
