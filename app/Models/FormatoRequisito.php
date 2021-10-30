<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Documento;
use App\Models\Requisito;

class FormatoRequisito extends Model
{
    use HasFactory;
    protected $table = 'formato_requisito';
    public $fillable = ['requisito_id', 'documento_id'];

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
