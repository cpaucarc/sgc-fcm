<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indicador extends Model
{
    use HasFactory;

    public $table = "indicadores";
    public $timestamps = false;
    public $fillable = ['objetivo', 'cod_ind_inicial', 'cod_ind_final', 'formula', 'minimo',
        'satisfactorio', 'sobresaliente', '', 'proceso_id', 'medicion_responsable_id', 'analisis_responsable_id'];
}
