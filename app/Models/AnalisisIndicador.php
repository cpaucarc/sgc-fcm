<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnalisisIndicador extends Model
{
    use HasFactory;

    protected $table = "analisis_indicadores";
    public $fillable = ['minimo', 'satisfactorio', 'sobresaliente', 'interes', 'total',
        'resultado', 'interpretacion', 'observacion', 'elaborado_por', 'revisado_por',
        'aprobado_por', 'indicador_id', 'fecha_medicion_inicio', 'fecha_medicion_fin'];

    public $dates = [
        'fecha_medicion_inicio',
        'fecha_medicion_fin'
    ];
}
