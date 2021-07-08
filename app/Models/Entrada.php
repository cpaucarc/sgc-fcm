<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $fillable = ['codigo', 'descripcion'];

    public function proveedor()
    {

    }
}