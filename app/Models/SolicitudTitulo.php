<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sustentacion;
use App\Models\EstadoSolicitud;

class SolicitudTitulo extends Model
{
    use HasFactory;
    protected $table = 'solicitud_titulo';
    public $fillable = ['estudiante_id', 'estado_id'];

    public function documentos()
    {
        return $this->hasMany(DocumentoSolicitudTitulo::class)
            ->with('documento', 'requisito')
            ->orderBy('created_at', 'desc');
    }
    //Relacion de uno a muchos (inversa)
    public function estudiante()
    {
        return $this->hasOne(Estudiante::class, 'id', 'estudiante_id')
            ->with('persona');
    }
    public function foto()
    {
        return $this->hasOne(DocumentoSolicitudTitulo::class)->ofMany()
            ->where('requisito_id', 6);
    }
    //Relacion de uno a muchos (inversa)
/*     public function sustentacion()
    {
        return $this->hasOne(Sustentacion::class, 'id', 'sustentacion_id')
            ->with('tesis');
    } */

    //Relacion de uno a muchos (inversa)
    public function estado_solicitud()
    {
        return $this->belongsTo(EstadoSolicitud::class);
    }
}
