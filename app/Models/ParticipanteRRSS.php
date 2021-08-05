<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParticipanteRRSS extends Model
{
    use HasFactory;

    public $table = "participante_rrss";
    public $timestamps = false;
    public $fillable = ['fecha_incorporacion', 'responsabilidad_social_id', 'estudiante_id', 'docente_id'];

    protected $dates = [
        'fecha_incorporacion',
    ];

    public function docente()
    {
        return $this->belongsTo(Docente::class);
    }

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class);
    }
}
