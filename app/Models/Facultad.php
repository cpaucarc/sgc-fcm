<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facultad extends Model
{
    use HasFactory;

    public $table = "facultades";
    public $timestamps = false;
    public $fillable = ['nombre', 'abrev'];
}
