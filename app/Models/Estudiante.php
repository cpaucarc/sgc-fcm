<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bachiller;

class Estudiante extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $fillable = ['codigo', 'estado', 'persona_id', 'escuela_id', 'facultad_id'];

    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }


    //Relacion de uno a uno
    public function bachiller(){
        return $this->hasOne(Bachiller::class);
    }
    public function escuela()
    {
        return $this->belongsTo(Escuela::class);
    }
}
