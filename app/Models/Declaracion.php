<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sustentacion;

class Declaracion extends Model
{
    use HasFactory;
    public $table = "declaraciones";
    public $timestamps = false;
    public $fillable = ['nombre'];

    //Relación de uno a muchos
    public function sustentacion()
    {
        return $this->hasMany(Sustentacion::class);
    }
}
