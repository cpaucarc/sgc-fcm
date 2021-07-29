<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salida extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $fillable = ['codigo', 'nombre', 'descripcion', 'actividad_id'];

    public function clientes()
    {
        return $this->hasMany(ClienteSalida::class);
    }

    public function documentos()
    {
        return $this->hasMany(SalidaCompleto::class);
    }

    public function actividad()
    {
        return $this->belongsTo(Actividad::class);
    }
}
