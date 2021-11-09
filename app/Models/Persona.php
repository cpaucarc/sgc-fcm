<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $fillable = ['dni', 'apellidos', 'nombres'];

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class, 'id', 'persona_id');
//        return $this->belongsTo(Estudiante::class, 'persona_id', 'id');
//        return $this->hasOne(Estudiante::class, 'id', 'persona_id');
//        return $this->hasOne(Estudiante::class);
    }
}
