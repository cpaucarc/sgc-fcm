<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $fillable = ['codigo', 'estado', 'persona_id', 'escuela_id'];

    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }
}
