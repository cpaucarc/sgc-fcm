<?php

namespace App\Http\Controllers;

use App\Models\NivelOficina;
use App\Models\Oficina;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
    public function index()
    {
        return view('auth.registro');
    }
}
