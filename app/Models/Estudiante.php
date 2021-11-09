<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bachiller;
use App\Models\SolicitudTitulo;

class Estudiante extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $fillable = ['codigo', 'persona_id', 'escuela_id', 'facultad_id'];

    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }

    //Relacion de uno a uno
    public function bachiller()
    {
        return $this->hasOne(Bachiller::class);
    }

    //Relación de uno a muchos
    public function solicitudTitulo()
    {
        return $this->hasOne(SolicitudTitulo::class)
            ->with('documentos');
    }

    public function escuela()
    {
        return $this->belongsTo(Escuela::class);
    }

    public function grados()
    {
        return $this->belongsToMany(GradoAcademico::class, 'grado_estudiante')
            ->withPivot(['created_at'])
            ->orderBy('grado_estudiante.created_at', 'desc');
    }

    public function gradoReciente()
    {
        return $grado_est = $this->hasOne(GradoEstudiante::class)->latestOfMany()
            ->with('grado');
    }

    public function solicitud()
    {
        return $this->hasOne(SolicitudBachiller::class)
            ->with('documentos');
    }

    public function solicitudConvalidacion()
    {
        return $this->hasOne(SolicitudConvalidacion::class)
            ->with('documentos');
    }

    public function convalidacionEstudiante()
    {
        return $this->belongsToMany(ConvalidacionEstudiante::class, 'convalidacion_estudiante')
            ->withPivot(['created_at'])
            ->orderBy('convalidacion_estudiante.created_at', 'desc');
    }

//    public function solicitudConvalidacion()
//    {
//        return $this->hasOne(SolicitudConvalidacion::class)
//            ->with('documentos');
//    }

}
