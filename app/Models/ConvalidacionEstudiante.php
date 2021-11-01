<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConvalidacionEstudiante extends Model
{
    use HasFactory;
    protected $table = 'convalidacion_estudiante';
    public $fillable = ['convalidacion_id', 'estudiante_id'];

    public function convalidacionEstudiante()
    {
        return $this->belongsTo(Convalidacion::class, 'convalidacion_id', 'id');
    }

    public function estudiante()
    {
        return $this->hasOne(Estudiante::class, 'id', 'estudiante_id')
            ->with('escuela', 'persona', 'solicitudConvalidacion');
    }
}
