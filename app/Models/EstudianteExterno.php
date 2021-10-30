<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Persona;
use App\Models\Institucion;

class EstudianteExterno extends Model
{
    use HasFactory;
    protected $table = 'estudiantes_externo';
    public $timestamps = false;
    public $fillable = ['email', 'persona_id', 'institucion_id'];

    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }

    public function institucion()
    {
        return $this->belongsTo(Institucion::class);
    }

    public function solicitudConvalidacion()
    {
        return $this->hasOne(SolicitudConvalidacion::class, 'estado_id')
            ->with('documentos');
    }
}
