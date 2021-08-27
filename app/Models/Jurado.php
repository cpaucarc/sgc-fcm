<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Docente;
use App\Models\Sustentacion;

class Jurado extends Model
{
    use HasFactory;

    public $table = "jurados";
    public $timestamps = false;
    public $fillable = ['cip', 'docente_id'];

    //Relación uno a uno (inversa)
    public function docente()
    {
        return $this->belongsTo(Docente::class);
    }

    //Relación muchos a muchos
    public function sutentacion()
    {
        return $this->belongsToMany(Sustentacion::class);
    }
}
