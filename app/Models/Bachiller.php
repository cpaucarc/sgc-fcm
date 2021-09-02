<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ciclo;
use App\Models\Estudiante;
use App\Models\BachillerTesis;

class Bachiller extends Model
{
    use HasFactory;

    public $table = "bachilleres";
    public $fillable = ['estudiante_id', 'ciclo_id'];
    public $timestamps = false;

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

    //Relación de uno a muchos
    public function bachiller_tesis()
    {
        return $this->hasMany(BachillerTesis::class);
    }
}
