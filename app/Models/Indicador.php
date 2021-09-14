<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indicador extends Model
{
    use HasFactory;

    protected $table = "indicadores";
    public $timestamps = false;
    public $fillable = ['objetivo', 'titulo_interes', 'titulo_total', 'titulo_resultado',
        'cod_ind_inicial', 'cod_ind_final', 'formula', 'minimo', 'satisfactorio',
        'sobresaliente', 'proceso_id', 'unidad_medida_id', 'frecuencia_id',
        'medicion_responsable_id', 'analisis_responsable_id', 'escuela_id', 'facultad_id'];

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

    public function frecuencia()
    {
        return $this->belongsTo(Frecuencia::class);
    }
}
