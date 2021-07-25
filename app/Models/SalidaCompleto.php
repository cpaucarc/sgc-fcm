<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalidaCompleto extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $fillable = ['fecha_operacion', 'cliente_salida_id', 'ciclo_id', 'documento_id'];
}
