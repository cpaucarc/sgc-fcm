<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOficina extends Model
{
    use HasFactory;

    public $fillable = ['user_id', 'oficina_id', 'entidad_id'];

    public function entidad()
    {
        return $this->hasOne(Entidad::class, 'id', 'entidad_id')
            ->with('responsable');
    }

    public function oficina()
    {
        return $this->belongsTo(Oficina::class)
            ->with('facultad', 'escuela', 'nivel');
    }

}
