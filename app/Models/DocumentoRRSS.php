<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentoRRSS extends Model
{
    use HasFactory;

    public $table = "documento_rrss";
    public $timestamps = false;
    public $fillable = ['responsabilidad_social_id', 'documento_id'];

    public function documento()
    {
        return $this->belongsTo(Documento::class);
    }
}
