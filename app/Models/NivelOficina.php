<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NivelOficina extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $fillable = ['nombre'];
}
