<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntradaCompleto extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $fillable = ['fecha_operacion', 'entrada_proveedor_id', 'ciclo_id', 'documento_id'];

    protected $dates = [
        'fecha_operacion',
    ];

    public function documento()
    {
        return $this->hasOne(Documento::class, 'id', 'documento_id');
    }
}
