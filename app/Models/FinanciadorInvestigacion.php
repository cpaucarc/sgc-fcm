<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinanciadorInvestigacion extends Model
{
    use HasFactory;

    public $table = "financiador_investigacion";
    public $timestamps = false;
    public $fillable = ['presupuesto', 'investigacion_id', 'financiador_id'];
}
