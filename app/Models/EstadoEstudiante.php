<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoEstudiante extends Model
{
    use HasFactory;

    protected $table = "estado_estudiante";
    public $timestamps = false;
    public $fillable = ['nombre', 'color'];
}
