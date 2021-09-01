<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvestigadorInvestigacion extends Model
{
    use HasFactory;

    public $table = "investigador_investigacion";
    public $fillable = ['es_responsable', 'investigacion_id', 'investigador_id'];
}
