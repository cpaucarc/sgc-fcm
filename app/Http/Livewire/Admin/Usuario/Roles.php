<?php

namespace App\Http\Livewire\Admin\Usuario;

use App\Models\Entidad;
use App\Models\Oficina;
use App\Models\User;
use App\Models\UserOficina;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Spatie\Permission\Contracts\Role;

class Roles extends Component
{
    public $usuario_actual;
    public $roles_faltantes, $oficinas;
    public $role_seleccionada, $nivel_seleccionado = 1, $oficina_seleccionado = 1;
    public $abrir = false, $mostrar_combo = false, $abrirEliminar = false;
    public $idEliminar = 0, $rolEliminar = "";

    protected $rules = [
        'oficina_seleccionado' => 'required|gt:0',
        'role_seleccionada' => 'required'
    ];

    public function mount($id)
    {
        $this->obtenerRolesActuales($id);
        $this->obtenerRolesFaltantes();
        $this->obtenerOficinas();
    }

    public function obtenerRolesActuales($id)
    {
        $this->usuario_actual = User::where('id', $id)
            ->with('trabajo')
            ->first();
    }

    public function obtenerRolesFaltantes()
    {
//        $ids = $this->usuario_actual->trabajo->pluck('entidad_id'); //ID de roles actuales
        //select role_id from model_has_roles where model_id = 1;
        $ids = DB::table('model_has_roles')->where('model_id', $this->usuario_actual->id)->pluck('role_id');
        $this->roles_faltantes = \Spatie\Permission\Models\Role::query()
            ->select('id', 'name')
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
        //Introducir en UserOficina
        //id, user_id, oficina_id, entidad_id, created_at, updated_at, id, id
        $role = \Spatie\Permission\Models\Role::findById($this->role_seleccionada);

        $entidad_seleccionada = Entidad::where('nombre', $role->name)->first()->id;

        if (is_null($entidad_seleccionada)) {
            $entidad_seleccionada = 14; //14:Otro
        }

        UserOficina::create([
            'user_id' => $this->usuario_actual->id,
            'oficina_id' => $this->oficina_seleccionado,
            'entidad_id' => $entidad_seleccionada,
        ]);

        //Introducir en ModelHasRoles
        $this->usuario_actual->assignRole($role->name);

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
