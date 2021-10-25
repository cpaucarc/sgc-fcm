<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function usuarios()
    {
        $usuarios = User::query()
            ->with('persona', 'roles')
            ->get();
        return view('admin.usuarios', compact('usuarios'));
    }
}
