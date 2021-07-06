<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    use HasFactory;

    public $table = "actividades";
    public $timestamps = false;
    public $fillable = ['nombre', 'estado', 'tipo_actividad_id', 'proceso_id'];
}
