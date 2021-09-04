<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Docente;
use App\Models\Tesis;

class Asesor extends Model
{
    use HasFactory;

    public $table = "asesores";
    public $timestamps = false;
    public $fillable = ['cip', 'docente_id'];

    //Relación uno a uno (inversa)
    public function docente()
    {
        return $this->belongsTo(Docente::class);
    }

    //Relaión uno a mucho
    public function tesis()
    {
        return $this->hasMany(Tesis::class);
    }
}
