<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TipoInstitucion;

class Institucion extends Model
{
    use HasFactory;
    protected $table = 'instituciones';

    public $timestamps = false;
    public $fillable = ['nombre', 'tipo_institucion_id'];

    public function tipo_institucion()
    {
        return $this->belongsTo(TipoInstitucion::class);
    }
}
