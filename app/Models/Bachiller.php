<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ciclo;
use App\Models\Estudiante;
use App\Models\Tesis;

class Bachiller extends Model
{
    use HasFactory;

    public $table = "bachilleres";
    public $fillable = ['ciclo_id', 'estudiante_id'];

    //Relación uno a muchos (inversa)
    public function ciclo()
    {
        return $this->belongsTo(Ciclo::class);
    }
    //Relación uno a uno (inversa)
    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class);
    }

    //Relación muchos a muchos
    public function tesis()
    {
        return $this->belongsToMany(Tesis::class);
    }
}
