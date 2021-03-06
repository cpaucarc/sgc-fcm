<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bachiller;
use App\Models\Sustentacion;

class Ciclo extends Model
{
    use HasFactory;

    public $fillable = ['nombre', 'fecha_inicio', 'fecha_fin'];
    public $timestamps = false;

    protected $dates = [
        'fecha_inicio',
        'fecha_fin',
    ];


    //Relación uno a muchos
    public function bachiller()
    {
        return $this->hasMany(Bachiller::class);
    }

    //Relación de uno a muchos
    public function sustentacion()
    {
        return $this->hasMany(Sustentacion::class);
    }
}
