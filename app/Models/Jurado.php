<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Docente;
use App\Models\JuradoSustentacion;

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

    //Relación de uno a muchos
    public function jurado_sustentacion()
    {
        return $this->hasMany(JuradoSustentacion::class);
    }
}
