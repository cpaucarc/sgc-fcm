<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    public $table = "proveedores";
    public $timestamps = false;
    public $fillable = ['codigo', 'entidad_id'];
}
