<?php

namespace App\Http\Livewire\Admin\Usuario;

use App\Models\Entidad;
use App\Models\Oficina;
use App\Models\Rol;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Roles extends Component
{
    public $usuario_actual;
    public $entidades_faltantes, $oficinas;
    public $entidad_seleccionada, $nivel_seleccionado = 1, $oficina_seleccionado = 1;
    public $abrir = false, $mostrar_combo = false, $abrirEliminar = false;
    public $idEliminar = 0, $rolEliminar = "";

    protected $rules = [
        'oficina_seleccionado' => 'required|gt:0',
        'entidad_seleccionada' => 'required'
    ];

    public function mount($id)
    {
        $this->obtenerRolesActuales($id);
        $this->obtenerEntidadesFaltantes();
        $this->obtenerOficinas();
    }

    public function obtenerRolesActuales($id)
    {
        $this->usuario_actual = User::where('id', $id)
            ->with('roles')
            ->first();
    }

    public function obtenerEntidadesFaltantes()
    {
        $ids = $this->usuario_actual->roles->pluck('entidad_id'); //ID de roles actuales
        $this->entidades_faltantes = Entidad::query()
            ->whereNotIn('id', $ids)
            ->get();
    }

    public function obtenerOficinas()
    {
        $this->oficinas = Oficina::query()
            ->with('facultad', 'escuela')
            ->where('nivel_oficina_id', $this->nivel_seleccionado)
            ->get();
    }

    public function updatedNivelSeleccionado()
    {
        if ($this->nivel_seleccionado > 1) {
            $this->obtenerOficinas();
            $this->oficina_seleccionado = 0;
            $this->mostrar_combo = true;
        } else {
            $this->mostrar_combo = false;
            $this->oficina_seleccionado = 1;
        }
    }

    public function asignarRol()
    {
        $this->validate();
        Rol::create([
            'user_id' => $this->usuario_actual->id,
            'oficina_id' => $this->oficina_seleccionado,
            'entidad_id' => $this->entidad_seleccionada
        ]);
        $this->obtenerRolesActuales($this->usuario_actual->id);
        $this->abrir = false;
    }

    public function abrirModalEliminar($id, $nombre)
    {
        $this->idEliminar = $id;
        $this->rolEliminar = $nombre;
        $this->abrirEliminar = true;
    }

    public function quitarRol()
    {
        if ($this->idEliminar > 0) {
            Rol::findOrFail($this->idEliminar)->delete();
            $this->obtenerRolesActuales($this->usuario_actual->id);
            $this->idEliminar = 0;
            $this->rolEliminar = "";
            $this->abrirEliminar = false;
        }
    }

    public function render()
    {
        return view('livewire.admin.usuario.roles');
    }
}
