<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\JuradoSustentacion;

class CargoJurado extends Model
{
    use HasFactory;
    public $table = "cargo_jurados";
    public $timestamps = false;
    public $fillable = ['nombre'];

    //Relacion de uno a muchos 
    public function jurado_sustentacion()
    {
        return $this->hasMany(JuradoSustentacion::class);
    }
}
