<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradoAcademico extends Model
{
    use HasFactory;

    public $table = "grado_academico";
    public $timestamps = false;
    public $fillable = ['nombre'];
}
