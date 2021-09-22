<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentoSolicitudBachiller extends Model
{
    use HasFactory;

    protected $table = 'documento_solicitud_bachiller';
    public $fillable = ['solicitud_bachiller_id', 'requisito_id', 'documento_id'];

    public function documento()
    {
        return $this->belongsTo(Documento::class);
    }
}
