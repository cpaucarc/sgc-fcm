<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoInvestigacion extends Model
{
    use HasFactory;

    protected $table = "estado_investigacion";
    public $timestamps = false;
    public $fillable = ['nombre', 'color'];
}
