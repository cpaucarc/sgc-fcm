<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investigador extends Model
{
    use HasFactory;

    public $table = "investigadores";
    public $timestamps = false;
    public $fillable = ['correo', 'sitio_web', 'foto', 'grado_academico_id', 'categoria_id', 'estudiante_id', 'docente_id'];

    public function docente()
    {
        return $this->belongsTo(Docente::class);
    }

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class);
    }

    public function grado()
    {
        return $this->belongsTo(GradoAcademico::class, 'grado_academico_id');
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function investigaciones()
    {
        return $this->belongsToMany(Investigacion::class, 'investigador_investigacion')
            ->withPivot(['es_responsable'])
            ->orderBy('created_at');
    }
}
