<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalidaCompleto extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $fillable = ['fecha_operacion', 'salida_id', 'ciclo_id', 'documento_id'];

    protected $dates = [
        'fecha_operacion',
    ];

    public function documento()
    {
        return $this->hasOne(Documento::class, 'id', 'documento_id');
    }

    public function salida()
    {
        return $this->belongsTo(Salida::class);
    }
}
