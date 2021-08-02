<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnalisisIndicador extends Model
{
    use HasFactory;

    public $table = "analisis_indicadores";
    public $fillable = ['minimo', 'satisfactorio', 'sobresaliente', 'interes', 'total', 'resultado', 'periodo',
        'interpretacion', 'observacion', 'elaborado_por', 'revisado_por', 'aprobado_por', 'indicador_id', 'escuela_id', 'facultad_id'];
}
