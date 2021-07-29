<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActividadCompleto extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $fillable = ['fecha_operacion', 'actividad_id', 'ciclo_id'];

    protected $dates = [
        'fecha_operacion',
    ];
}
