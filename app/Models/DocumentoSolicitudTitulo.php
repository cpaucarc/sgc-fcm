<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Requisito;

class DocumentoSolicitudTitulo extends Model
{
    use HasFactory;
    protected $table = 'documento_solicitud_titulo';
    public $fillable = ['solicitud_titulo_id', 'requisito_id', 'documento_id'];


    //Relacion de uno a muchos (inversa)
    public function documento()
    {
        return $this->belongsTo(Documento::class);
    }

    //Relacion de uno a muchos (inversa)
    public function requisito()
    {
        return $this->belongsTo(Requisito::class);
    }
}
