<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tesis;
use App\Models\Ciclo;
use App\Models\Declaracion;
use App\Models\Jurado;

class Sustentacion extends Model
{
    use HasFactory;

    public $table = "sustentaciones";
    public $timestamps = false;
    public $fillable = ['fecha', 'tesis_id', 'ciclo_id', 'declaracion_id'];

    //Relacion de uno a muchos (inversa)
    public function tesis()
    {
        return $this->belongsTo(Tesis::class);
    }

    //Relacion de uno a muchos (inversa)
    public function ciclo()
    {
        return $this->belongsTo(Ciclo::class);
    }

    //Relacion de uno a muchos (inversa)
    public function declaracion()
    {
        return $this->belongsTo(Declaracion::class);
    }

     //Relación muchos a muchos (inversa)
     public function jurado()
     {
         return $this->belongsToMany(Jurado::class);
     }
}
