<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Documento;
use App\Models\Requisito;

class DocumentoSolicitudConvalidacion extends Model
{
    use HasFactory;
    protected $table = 'documento_solicitud_convalidacion';
    public $fillable = ['solicitud_id', 'requisito_id', 'documento_id'];

    public function documento()
    {
        return $this->belongsTo(Documento::class);
    }

    public function requisito()
    {
        return $this->belongsTo(Requisito::class);
    }
}
