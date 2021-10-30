<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tesis;
use App\Models\Ciclo;
use App\Models\Declaracion;
use App\Models\JuradoSustentacion;
use App\Models\SolicitudTitulo;

class Sustentacion extends Model
{
    use HasFactory;

    protected $table = "sustentaciones";
    public $timestamps = false;
    public $fillable = ['fecha_sustentacion', 'tesis_id', 'escuela_id', 'ciclo_id', 'declaracion_id'];

    //Relacion de uno a muchos (inversa)
    public function tesis()
    {
        return $this->belongsTo(Tesis::class);
    }

    //Relacion de uno a muchos (inversa)
    public function escuela()
    {
        return $this->belongsTo(Escuela::class);
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

    //Relación de uno a muchos
    public function jurado_sustentacion()
    {
        return $this->hasMany(JuradoSustentacion::class);
    }

     //Relación de uno a muchos
    /*  public function solicitud_titulo()
     {
         return $this->hasMany(SolicitudTitulo::class);
     } */
}
