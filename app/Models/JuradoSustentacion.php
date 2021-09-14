<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CargoJurado;
use App\Models\Sustentacion;
use App\Models\Jurado;

class JuradoSustentacion extends Model
{
    use HasFactory;

    protected $table = "jurado_sustentacion";
    public $timestamps = false;
    public $fillable = ['jurado_id', 'sustentacion_id', 'cargo_jurado_id'];


    //Relacion de uno a muchos (inversa)
    public function cargo_jurado()
    {
        return $this->belongsTo(CargoJurado::class);
    }

    //Relacion de uno a muchos (inversa)
    public function sustentacion()
    {
        return $this->belongsTo(Sustentacion::class);
    }
    //Relacion de uno a muchos (inversa)
    public function jurado()
    {
        return $this->belongsTo(Jurado::class);
    }
}
