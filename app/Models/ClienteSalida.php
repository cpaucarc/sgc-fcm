<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClienteSalida extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $fillable = ['cliente_id', 'salida_id', 'actividad_id'];
}
