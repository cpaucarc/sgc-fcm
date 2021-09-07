<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RRSSEncuesta extends Model
{
    use HasFactory;

    protected $table = "rrss_encuestas";
    public $timestamps = false;
    public $fillable = ['fecha_inicio', 'fecha_fin', 'link', 'responsabilidad_social_id'];
    public $dates = [
        'fecha_inicio',
        'fecha_fin'
    ];

    public function responsabilidad_social()
    {
        return $this->belongsTo(ResponsabilidadSocial::class);
    }

}
