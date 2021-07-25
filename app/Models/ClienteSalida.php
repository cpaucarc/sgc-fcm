<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClienteSalida extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $fillable = ['cliente_id', 'salida_id'];

    public function cliente()
    {
//        return $this->belongsTo(Cliente::class);
        return $this->hasOne(Cliente::class, 'id', 'cliente_id');
    }

    public function salida()
    {
        return $this->belongsTo(Salida::class);
    }

}
