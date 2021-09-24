<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SolicitudTitulo;

class EstadoSolicitud extends Model
{
    use HasFactory;

    protected $table = "estado_solicitud";
    public $timestamps = false;
    public $fillable = ['nombre', 'color'];


      //Relación de uno a muchos
      public function solicitud_titulo()
      {
          return $this->hasMany(SolicitudTitulo::class);
      }
}
