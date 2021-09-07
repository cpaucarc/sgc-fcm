<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $table = "proveedores";
    public $timestamps = false;
    public $fillable = ['codigo', 'entidad_id'];

    public function entidad()
    {
        return $this->belongsTo(Entidad::class);
    }
}
