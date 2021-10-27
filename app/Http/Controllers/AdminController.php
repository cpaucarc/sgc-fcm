<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function usuarios()
    {
        return view('admin.usuarios');
    }

    public function modificar_usuario($id)
    {
        $usuario = User::where(DB::raw('sha1(id)'), $id)
            ->with('persona')
            ->first();

        return view('admin.modificar_usuario', compact('usuario'));
    }
}
