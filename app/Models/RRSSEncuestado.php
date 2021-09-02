<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RRSSEncuestado extends Model
{
    use HasFactory;

    public $table = "rrss_encuestados";
    public $fillable = ['nombre_encuestado', 'correo_encuestado', 'rrss_encuesta_id'];

}
