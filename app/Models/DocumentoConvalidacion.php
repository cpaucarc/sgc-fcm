<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentoConvalidacion extends Model
{
    use HasFactory;
    protected $table = 'documento_convalidacion';
    public $fillable = ['solicitud_convalidacion_id', 'requisito_id', 'documento_id'];

    public function documento()
    {
        return $this->belongsTo(Documento::class);
    }

    public function requisito()
    {
        return $this->belongsTo(Requisito::class);
    }
}
