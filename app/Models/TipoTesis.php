<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tesis;

class TipoTesis extends Model
{
    use HasFactory;
    public $table = "tipo_tesis";
    public $timestamps = false;
    public $fillable = ['nombre'];

    //Relacion uno a muchos
    public function tesis(){
        return $this->hasMany(Tesis::class);
    }
}
