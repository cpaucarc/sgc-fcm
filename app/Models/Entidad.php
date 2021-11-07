<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entidad extends Model
{
    use HasFactory;

    protected $table = "entidades";
    public $timestamps = false;
    public $fillable = ['nombre'];

    public function responsable()
    {
        return $this->belongsTo(Responsable::class, 'id', 'entidad_id');
    }

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'id', 'entidad_id');
    }

    public function salidas()
    {
        return $this->hasManyThrough(ClienteSalida::class, Cliente::class);
    }

    public function actividades()
    {
        return $this->hasManyThrough(ActividadResponsable::class, Responsable::class);
    }

    public function entradas()
    {
        return $this->hasManyThrough(EntradaProveedor::class, Proveedor::class);
    }
}
