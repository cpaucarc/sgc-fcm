<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oficina extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $fillable = ['entidad_id', 'escuela_id', 'facultad_id'];

    public function entidad()
    {
        return $this->hasOne(Entidad::class, 'id', 'entidad_id');
    }
}
