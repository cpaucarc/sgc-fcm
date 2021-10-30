<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\EstudianteExterno;
use App\Models\Estudiante;
use App\Models\Ciclo;

class Convalidacion extends Model
{
    use HasFactory;
    protected $table = 'convalidaciones';
    public $fillable = ['vacantes', 'fecha_inicio', 'fecha_fin', 'estudiante_externo_id', 'estudiante_id', 'ciclo_id'];
    public $timestamps = false;


    public function estudiante_externo()
    {
        return $this->belongsToMany(EstudianteExterno::class, 'convalidacion_estudiante')
            ->withPivot(['created_at'])
            ->orderBy('convalidacion_estudiante.created_at', 'desc');
    }
    public function estudiante()
    {
        return $this->belongsToMany(Estudiante::class, 'convalidacion_estudiante')
            ->withPivot(['created_at'])
            ->orderBy('convalidacion_estudiante.created_at', 'desc');
    }
    public function ciclo()
    {
        return $this->belongsTo(Ciclo::class);
    }
}
