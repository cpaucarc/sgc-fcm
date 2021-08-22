<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResponsabilidadSocial extends Model
{
    use HasFactory;

    public $table = "responsabilidad_social";
    public $fillable = ['titulo', 'descripcion', 'lugar', 'fecha_inicio', 'fecha_fin', 'ciclo_id', 'escuela_id', 'empresa_id', 'docente_responsable_id', 'estudiante_responsable_id'];
    protected $dates = [
        'fecha_inicio',
        'fecha_fin',
    ];

    public function ciclo()
    {
        return $this->belongsTo(Ciclo::class);
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function escuela()
    {
        return $this->belongsTo(Escuela::class);
    }

    public function docente()
    {
        return $this->belongsTo(Docente::class, 'docente_responsable_id', 'id');
    }

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class, 'estudiante_responsable_id', 'id');
    }

    public function participantes_estudiantes()
    {
        return $this->hasMany(ParticipanteRRSS::class)->whereNotNull('estudiante_id');
    }

    public function participantes_docentes()
    {
        return $this->hasMany(ParticipanteRRSS::class)->whereNotNull('docente_id');
    }

    public function documentos()
    {
        return $this->hasMany(DocumentoRRSS::class)->orderBy('id', 'desc');
    }

    public function encuesta()
    {
        return $this->hasOne(RRSSEncuesta::class);
    }

}
