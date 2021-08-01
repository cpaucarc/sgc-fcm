<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResponsabilidadSocial extends Model
{
    use HasFactory;

    public $table = "responsabilidad_social";
    public $fillable = ['titulo', 'descripcion', 'lugar', 'fecha_inicio', 'fecha_fin', 'ciclo_id', 'empresa_id', 'docente_responsable_id', 'estudiante_responsable_id'];
}
