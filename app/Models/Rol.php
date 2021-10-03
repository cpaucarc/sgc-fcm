<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;

    protected $table = "roles";
    public $timestamps = false;
    public $fillable = ['user_id', 'oficina_id', 'entidad_id'];

    public function entidad()
    {
        return $this->hasOne(Entidad::class, 'id', 'entidad_id')
            ->with('responsable');
    }

    public function oficina()
    {
        return $this->belongsTo(Oficina::class);
    }

}
