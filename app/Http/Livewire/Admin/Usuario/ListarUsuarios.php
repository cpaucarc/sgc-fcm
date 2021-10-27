<?php

namespace App\Http\Livewire\Admin\Usuario;

use App\Models\Entidad;
use App\Models\Rol;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ListarUsuarios extends Component
{
    use WithPagination;

    public $cantidad = 10, $buscar;
    public $entidades, $entidades_seleccionados = [];
    public $idUsuario = 0, $nombreUsuario, $abrirEliminar = false; //para Eliminar
    public $listeners = [
        'renderizarTabla' => 'render'
    ];

    public function updatingBuscar()
    {
        $this->resetPage();
    }

    public function updatingCantidad()
    {
        $this->resetPage();
    }

    public function updatingEntidadesSeleccionados()
    {
        $this->resetPage();
    }

    public function abrirModalEliminar($id, $usuario)
    {
        $this->idUsuario = $id;
        $this->nombreUsuario = $usuario;
        $this->abrirEliminar = true;
    }

    public function eliminarUsuario()
    {
        if ($this->idUsuario > 0) {
            //eliminar roles del usuario
            Rol::where('user_id', $this->idUsuario)->delete();
            //eliminar usuario
            User::find($this->idUsuario)->delete();
            if (Auth::user()->id !== $this->idUsuario) {
                //si no es usuario actual, actualizar tabla
                $this->emit('eliminado', "El usuario $this->nombreUsuario fue eliminado de los registros.");
                $this->emit('renderizarTabla');
                $this->abrirEliminar = false;
                $this->idUsuario = 0;
            } else {
                //si es usuario actual, ir a login
                return redirect()->route('login');
            }
        }
    }

    public function render()
    {
        $this->entidades = Entidad::query()
            ->whereIn('id', function ($query) {
                $query->select('entidad_id')
                    ->from('roles');
            })
            ->get();

        //select id, nombre from entidades where id in (select entidad_id from roles);

        $query = User::query()
            ->with('persona', 'roles')
            ->whereHas('persona', function ($query1) {
                return $query1->where('nombres', 'like', '%' . $this->buscar . '%')
                    ->orWhere('apellidos', 'like', '%' . $this->buscar . '%')
                    ->orWhere('dni', 'like', '%' . $this->buscar . '%');
            });

        if (count($this->entidades_seleccionados) > 0) {
            $query->whereHas('roles', function ($q2) {
                return $q2->whereIn('entidad_id', $this->entidades_seleccionados);
            });
        }

        $usuarios = $query->orderBy('created_at', 'desc')
            ->paginate($this->cantidad);
        return view('livewire.admin.usuario.listar-usuarios', compact('usuarios'));
    }
}
