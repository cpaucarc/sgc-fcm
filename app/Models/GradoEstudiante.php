<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradoEstudiante extends Model
{
    use HasFactory;

    protected $table = "grado_estudiante";
    public $fillable = ['estudiante_id', 'grado_academico_id'];

    public function grado()
    {
        return $this->belongsTo(GradoAcademico::class, 'grado_academico_id', 'id');
    }

    public function estudiante()
    {
        return $this->hasOne(Estudiante::class, 'id', 'estudiante_id')
            ->with('escuela', 'gradoReciente', 'persona', 'solicitud');
    }
}
