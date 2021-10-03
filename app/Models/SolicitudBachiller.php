<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudBachiller extends Model
{
    use HasFactory;

    protected $table = 'solicitud_bachiller';
    public $fillable = ['estudiante_id', 'estado_id'];


    public function documentos()
    {
        return $this->hasMany(DocumentoSolicitudBachiller::class)
            ->with('documento', 'requisito')
            ->orderBy('created_at', 'desc');
    }

    public function estudiante()
    {
        return $this->hasOne(Estudiante::class, 'id', 'estudiante_id')
            ->with('persona');
    }

    public function foto()
    {
        return $this->hasOne(DocumentoSolicitudBachiller::class)->ofMany()
            ->where('requisito_id', 6);
    }

}
