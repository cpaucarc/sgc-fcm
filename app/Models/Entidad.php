<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entidad extends Model
{
    use HasFactory;

    public $table = "entidades";
    public $timestamps = false;
    public $fillable = ['nombre'];
}
