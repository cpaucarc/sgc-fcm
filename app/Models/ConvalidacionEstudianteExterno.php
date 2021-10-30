<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConvalidacionEstudianteExterno extends Model
{
    use HasFactory;
    protected $table = 'convalidacion_estudiante_externo';
    public $fillable = ['convalidacion_id', 'estudiante_externo_id'];

    public function convalidacion()
    {
        return $this->belongsTo(Convalidacion::class, 'convalidacion_id', 'id');
    }

    public function estudiante_externo()
    {
        return $this->hasOne(EstudianteExterno::class, 'id', 'estudiante_externo_id')
            ->with('institucion', 'persona', 'solicitud');
    }
}
