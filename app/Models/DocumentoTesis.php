<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentoTesis extends Model
{
    use HasFactory;

    public $table = "documento_tesis";
    public $timestamps = false;
    public $fillable = ['tesis_id', 'documento_id'];
    
}
