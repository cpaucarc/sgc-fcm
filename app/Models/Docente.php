<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Persona;
use App\Models\Asesor;
use App\Models\Jurado;

class Docente extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $fillable = ['codigo', 'estado', 'persona_id', 'escuela_id'];

    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }
    //Relación de uno a uno
    public function asesor()
    {
        return $this->hasOne(Asesor::class);
    }

    //Relación de uno a uno
    public function jurado()
    {
        return $this->hasOne(Jurado::class);
    }
}
