<?php

namespace App\Http\Livewire\Admin\Usuario;

use App\Models\Persona;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class CrearUsuario extends Component
{
    public $abrir = false;
    public $dni, $apellidos, $nombres, $correo, $password;
    public $toggle = false;
    protected $rules = [
        'dni' => 'required|size:8|unique:personas,dni',
        'apellidos' => 'required',
        'nombres' => 'required',
        'correo' => 'required|email|unique:users,email',
        'password' => 'required'
    ];

    public function updatedToggle($value)
    {
        if ($value) { // Usar el dni como contraseña
            $this->toggle = $value;
            $this->password = $this->dni;
        } else { //Usar una contraseña distinta
            $this->password = '';
        }
    }

    public function registrar()
    {
        $this->validate();
        $persona = Persona::create([
            'dni' => $this->dni,
            'apellidos' => $this->apellidos,
            'nombres' => $this->nombres,
        ]);
        User::create([
            'email' => $this->correo,
            'password' => Hash::make($this->password),
            'persona_id' => $persona->id
        ]);
        //Mostrar mensaje
        $this->abrir = false;
        $this->emit('guardado', "El usuario $this->apellidos $this->nombres fue registrado satisafactoriamente");

        //Actualizar tabla
        $this->emit('renderizarTabla');
        $this->reset(['dni', 'nombres', 'apellidos', 'correo', 'password']);
    }

    public function render()
    {
        return view('livewire.admin.usuario.crear-usuario');
    }
}
