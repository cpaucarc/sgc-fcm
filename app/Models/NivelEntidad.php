<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NivelEntidad extends Model
{
    use HasFactory;

    public $table = "nivel_entidades";
    public $timestamps = false;
    public $fillable = ['nombre'];
}
