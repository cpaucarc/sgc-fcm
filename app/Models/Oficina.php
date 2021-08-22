<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oficina extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $fillable = ['nivel_oficina_id', 'escuela_id', 'facultad_id'];

    public function facultad()
    {
        return $this->belongsTo(Facultad::class);
    }
}
