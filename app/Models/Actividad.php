<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    use HasFactory;

    protected  $table = "actividades";
    public $timestamps = false;
    public $fillable = ['nombre', 'tipo_actividad_id', 'proceso_id'];

    public function entradas()
    {
        return $this->hasMany(EntradaProveedor::class, 'actividad_id', 'id');
    }

    public function salidas()
    {
        return $this->hasMany(Salida::class, 'actividad_id', 'id');
    }

    public function tipoActividad()
    {
        return $this->belongsTo(TipoActividad::class, 'tipo_actividad_id', 'id');
    }

    public function proceso()
    {
        return $this->belongsTo(Proceso::class, 'proceso_id', 'id');
    }

    public function estadoActual($cicloID)
    {
        return $this->hasOne(ActividadCompleto::class)
            ->where('ciclo_id', '=', $cicloID)
            ->get();
    }

    public function responsable()
    {
        return $this->hasOne(ActividadResponsable::class);
    }

}
