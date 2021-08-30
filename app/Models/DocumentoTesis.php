<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tesis;
use App\Models\Documento;

class DocumentoTesis extends Model
{
    use HasFactory;

    public $table = "documento_tesis";
    public $timestamps = false;
    public $fillable = ['tesis_id', 'documento_id'];

    //Relacion de uno a muchos (inversa)
    public function tesis()
    {
        return $this->belongsTo(Tesis::class);
    }

    //Relacion de uno a muchos (inversa)
    public function documento()
    {
        return $this->belongsTo(Documento::class);
    }
}
