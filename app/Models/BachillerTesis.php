<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tesis;
use App\Models\Bachiller;

class BachillerTesis extends Model
{
    use HasFactory;

    public $table = "bachiller_tesis";
    public $timestamps = false;
    public $fillable = ['bachiller_id', 'tesis_id'];


    //Relacion de uno a muchos (inversa)
    public function tesis()
    {
        return $this->belongsTo(Tesis::class);
    }
    //Relacion de uno a muchos (inversa)
    public function bachiller()
    {
        return $this->belongsTo(Bachiller::class);
    }
}
