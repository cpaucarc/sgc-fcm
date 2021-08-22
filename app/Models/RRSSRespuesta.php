<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RRSSRespuesta extends Model
{
    use HasFactory;

    public $table = "rrss_respuestas";
    public $timestamps = false;
    public $fillable = ['respuesta', 'pregunta_id', 'encuestado_id'];

}
