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
    public $fillable = ['estudiante_id', 'sustentacion_id', 'estado_id'];

    //Relacion de uno a muchos (inversa)
    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class);
    }

    //Relacion de uno a muchos (inversa)
    public function sustentacion()
    {
        return $this->belongsTo(Sustentacion::class);
    }

    //Relacion de uno a muchos (inversa)
    public function estado_solicitud()
    {
        return $this->belongsTo(EstadoSolicitud::class);
    }
}
