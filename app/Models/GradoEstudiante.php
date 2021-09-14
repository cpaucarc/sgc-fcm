<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradoEstudiante extends Model
{
    use HasFactory;

    protected $table = "grado_estudiante";
    public $fillable = ['estudiante_id', 'grado_academico_id'];
}
