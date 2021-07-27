<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entidad extends Model
{
    use HasFactory;

    public $table = "entidades";
    public $timestamps = false;
    public $fillable = ['nombre'];

    public function responsable()
    {
        return $this->belongsTo(Responsable::class, 'id', 'entidad_id');
    }

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'id', 'entidad_id');
    }
}
