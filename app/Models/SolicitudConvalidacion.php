<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DocumentoSolicitudConvalidacion;


class SolicitudConvalidacion extends Model
{
    use HasFactory;
    protected $table = 'solicitud_convalidacion';
    public $fillable = ['estudiante_id', 'estado_id'];

    public function documentos()
    {
        return $this->hasMany(DocumentoSolicitudConvalidacion::class)
            ->with('documento', 'requisito')
            ->orderBy('created_at', 'desc');
    }
    public function estudiante_externo()
    {
        return $this->hasOne(EstudianteExterno::class, 'id', 'estudiante_externo_id')
            ->with('persona');
    }
    public function estudiante()
    {
        return $this->hasOne(Estudiante::class, 'id', 'estudiante_id')
            ->with('persona');
    }

    public function foto()
    {
        return $this->hasOne(DocumentoSolicitudConvalidacion::class)->ofMany()
            ->where('requisito_id', 6);
    }
}
