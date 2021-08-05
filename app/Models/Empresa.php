<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $fillable = ['nombre', 'ruc', 'telefono', 'correo', 'direccion', 'ubicacion'];


    public function rrss()
    {
//        return $this->belongsToMany(ResponsabilidadSocial::class, Empresa::class, 'alliwhere');
        return $this->hasMany(ResponsabilidadSocial::class);
    }
}
