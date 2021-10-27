<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DocumentoTesis;
use App\Models\DocumentoSolicitudTitulo;
use App\Models\FormatoRequisito;

class Documento extends Model
{
    use HasFactory;
    public $fillable = ['nombre', 'enlace_interno', 'enlace_externo'];

    //Relación de uno a muchos
    public function documento_tesis()
    {
        return $this->hasMany(DocumentoTesis::class);
    }

    //Relación de uno a muchos
    public function documento_solicitud_titulo()
    {
        return $this->hasMany(DocumentoSolicitudTitulo::class);
    }

    //Relación de uno a muchos
    public function formato_requisito()
    {
        return $this->hasMany(FormatoRequisito::class);
    }
}
