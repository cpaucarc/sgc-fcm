<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoActividad extends Model
{
    use HasFactory;

    protected $table = "tipo_actividades";
    public $timestamps = false;
    public $fillable = ['nombre'];
}
