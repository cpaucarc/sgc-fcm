<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntradaProveedor extends Model
{
    use HasFactory;

    public $table = "entrada_proveedores";
    public $timestamps = false;
    public $fillable = ['proveedor_id', 'actividad_id', 'entrada_id'];
}
