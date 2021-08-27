<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CargoJurado;

class JuradoSustentacion extends Model
{
    use HasFactory;

    public $table = "jurado_sustentacion";
    public $timestamps = false;
    public $fillable = ['jurado_id', 'sustentacion_id', 'cargo_jurado_id'];


    //Relacion de uno a muchos (inversa)
    public function cargo_jurado()
    {
        return $this->belongsTo(CargoJurado::class);
    }
}
