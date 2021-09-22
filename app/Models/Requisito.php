<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DocumentoSolicitudTitulo;

class Requisito extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $fillable = ['nombre', 'descripcion', 'proceso_id'];

    //Relación de uno a muchos
    public function documento_solicitud_titulo()
    {
        return $this->hasMany(DocumentoSolicitudTitulo::class);
    }
}
