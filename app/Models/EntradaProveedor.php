<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntradaProveedor extends Model
{
    use HasFactory;

    protected $table = "entrada_proveedores";
    public $timestamps = false;
    public $fillable = ['proveedor_id', 'actividad_id', 'entrada_id'];

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class)
            ->with('entidad');
    }

    public function entrada()
    {
        return $this->belongsTo(Entrada::class);
    }

    public function actividad()
    {
        return $this->belongsTo(Actividad::class);
    }

    public function documentos()
    {
        return $this->hasMany(EntradaCompleto::class)
            ->with('documento');
    }

    public function documentosCicloActual($cicloID)
    {
        return $this->hasMany(EntradaCompleto::class)
            ->where('ciclo_id', '=', $cicloID)
            ->get();
    }

}
