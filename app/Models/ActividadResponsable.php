<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActividadResponsable extends Model
{
    use HasFactory;

    protected $table = "actividad_responsables";
    public $timestamps = false;
    public $fillable = ['responsable_id', 'actividad_id'];

    public function actividad()
    {
        return $this->belongsTo(Actividad::class)
            ->with('proceso');
    }

    public function responsable()
    {
        return $this->belongsTo(Responsable::class)
            ->with('entidad');
    }

}
