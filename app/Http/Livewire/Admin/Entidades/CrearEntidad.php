<?php

namespace App\Http\Livewire\Admin\Entidades;

use App\Models\Entidad;
use Livewire\Component;

class CrearEntidad extends Component
{
    public $abrir = false;
    public $nombre;
    protected $rules = [
        'nombre' => 'required|unique:entidades,nombre'
    ];

    public function guardar()
    {
        $this->validate();
        Entidad::create([
            'nombre' => $this->nombre
        ]);
        $this->abrir = false;
        $this->emit('guardado', "Se ha creado una nueva entidad denominado $this->nombre.");
        $this->emit('cargarEntidades');
        $this->nombre = "";
    }

    public function render()
    {
        return view('livewire.admin.entidades.crear-entidad');
    }
}
