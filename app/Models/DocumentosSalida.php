<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentosSalida extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $fillable = ['cliente_salida_id', 'documento_id'];
}
