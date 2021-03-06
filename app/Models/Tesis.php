<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Asesor;
use App\Models\TipoTesis;
use App\Models\Sustentacion;
use App\Models\Bachiller;
use App\Models\BachillerTesis;
use App\Models\DocumentoTesis;

class Tesis extends Model
{
    use HasFactory;

    protected $table = "tesis";
    public $timestamps = false;
    public $fillable = ['numero_registro', 'titulo', 'anio', 'asesor_id', 'tipo_tesis_id'];

    //Relación de uno a muchos (inversa)
    public function asesor()
    {
        return $this->belongsTo(Asesor::class);
    }

    //Relación de uno a muchos (inversa)
    public function tipo_tesis()
    {
        return $this->belongsTo(TipoTesis::class);
    }

    //Relación de uno a muchos
    public function sustentacion()
    {
        return $this->hasMany(Sustentacion::class);
    }

    //Relación muchos a muchos (inversa)
    public function bachiller()
    {
        return $this->belongsToMany(Bachiller::class);
    }

    //Relación de uno a muchos
    public function bachiller_tesis()
    {
        return $this->hasMany(BachillerTesis::class);
    }

    //Relación de uno a muchos
    public function documento_tesis()
    {
        return $this->hasMany(DocumentoTesis::class);
    }
}
