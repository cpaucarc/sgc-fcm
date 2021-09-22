<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradoAcademico extends Model
{
    use HasFactory;

    protected $table = "grado_academico";
    public $timestamps = false;
    public $fillable = ['nombre', 'color'];

    public function bachilleres()
    {
        return $this->belongsToMany(Estudiante::class, 'grado_estudiante')
            ->withPivot(['created_at'])
            ->orderBy('grado_estudiante.created_at', 'desc');
    }

}
