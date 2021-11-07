<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $fillable = ['codigo', 'nombre', 'descripcion', 'proceso_id'];

    public function proceso()
    {
        return $this->belongsTo(Proceso::class);
    }

}
