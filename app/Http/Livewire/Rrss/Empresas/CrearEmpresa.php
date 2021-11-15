<?php

namespace App\Http\Livewire\Rrss\Empresas;

use App\Models\Empresa;
use Livewire\Component;

class CrearEmpresa extends Component
{
    public $mostrar = false;
    public $nombre, $ruc, $telefono, $correo, $direccion, $ubicacion;

    protected $rules = [
        'nombre' => 'required',
        'ruc' => 'required|min:11|max:11|unique:empresas,ruc',
        'telefono' => 'nullable|max:9|min:9|unique:empresas,telefono',
        'correo' => 'nullable|email',
        'direccion' => 'nullable|max:200',
        'ubicacion' => 'nullable|max:200',
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

        $this->emit('guardado', "Se agregó correctamente la empresa " . $this->nombre);
//        session()->flash('flash.banner', 'Se agregó correctamente la empresa');
        $this->reset(['mostrar', 'nombre', 'ruc', 'telefono', 'correo', 'direccion', 'ubicacion']);
        $this->emit('renderizar');
    }

    public function render()
    {
        return view('livewire.rrss.empresas.crear-empresa');
    }
}
