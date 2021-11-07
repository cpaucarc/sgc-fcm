<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proceso extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $fillable = ['nombre', 'facultad_id'];

    public function actividades()
    {
        return $this->hasMany(Actividad::class);
    }

    public function indicadores()
    {
        return $this->hasMany(Indicador::class);
    }

}
