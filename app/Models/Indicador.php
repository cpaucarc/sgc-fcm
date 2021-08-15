<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indicador extends Model
{
    use HasFactory;

    public $table = "indicadores";
    public $timestamps = false;
    public $fillable = ['objetivo', 'titulo_interes', 'titulo_total', 'titulo_resultado', 'cod_ind_inicial', 'cod_ind_final', 'formula', 'minimo',
        'satisfactorio', 'sobresaliente', '', 'proceso_id', 'medicion_responsable_id', 'analisis_responsable_id'];

    public function escuela()
    {
        return $this->belongsTo(Escuela::class);
    }

    public function facultad()
    {
        return $this->belongsTo(Facultad::class);
    }

    public function proceso()
    {
        return $this->belongsTo(Proceso::class);
    }

    public function analisis()
    {
        return $this->hasMany(AnalisisIndicador::class)->orderBy('created_at');
    }

}
