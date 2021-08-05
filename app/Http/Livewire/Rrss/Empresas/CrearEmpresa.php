<?php

namespace App\Http\Livewire\Rrss\Empresas;

use App\Models\Empresa;
use Livewire\Component;

class CrearEmpresa extends Component
{
    public $mostrar = false;
    public $nombre;
    public $ruc;
    public $telefono;
    public $correo;
    public $direccion;
    public $ubicacion;

    protected $rules = [
        'nombre' => 'required',
        'ruc' => 'required|min:11|max:11',
        'telefono' => 'max:9|min:9',
        'correo' => 'email',
        'direccion' => 'max:200',
        'ubicacion' => 'max:200',
    ];


    public function guardarEmpresa()
    {
        $this->validate();

        $empresa = Empresa::create([
            'nombre' => $this->nombre,
            'ruc' => $this->ruc,
        ]);

        if ($this->telefono) {
            $empresa->telefono = $this->telefono;
        }
        if ($this->correo) {
            $empresa->correo = $this->correo;
        }
        if ($this->direccion) {
            $empresa->direccion = $this->direccion;
        }
        if ($this->ubicacion) {
            $empresa->ubicacion = $this->ubicacion;
        }

        $empresa->save();

        session()->flash('message', "Se agregó correctamente la empresa " . $this->nombre);
        $this->reset(['mostrar', 'nombre', 'ruc', 'telefono', 'correo', 'direccion', 'ubicacion']);
        $this->emit('renderizar');
    }

    public function render()
    {
        return view('livewire.rrss.empresas.crear-empresa');
    }
}
