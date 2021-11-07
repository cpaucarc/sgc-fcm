<?php

namespace App\Http\Livewire\Admin\Entidades;

use App\Models\Cliente;
use App\Models\ClienteSalida;
use App\Models\Entidad;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ListarEntidades extends Component
{
    use WithPagination;

    public $cantidad = 9, $buscar = "";

    public $listeners = [
        'cargarEntidades' => 'render'
    ];

    public function eliminar($id)
    {
        try {
            $et = Entidad::find($id);
            $nombre = $et->nombre;
            $et->delete();
            $this->emit('guardado', "Se ha eliminado la entidad denominado $nombre.");
            $this->emit('cargarEntidades');
        } catch (\Illuminate\Database\QueryException $e) {
            $this->emit('error', "No se puede eliminar la entidad denominado $nombre porque tiene dependencias externas.");
        }
    }

    public function render()
    {
        $entidades = Entidad::query()
            ->withCount('salidas', 'actividades', 'entradas')
            ->where('nombre', 'like', "%" . $this->buscar . "%")
            ->orderBy('nombre')
            ->paginate($this->cantidad);

        return view('livewire.admin.entidades.listar-entidades', compact('entidades'));
    }

    // On Update
    public function updatingBuscar()
    {
        $this->resetPage();
    }

    public function updatingCantidad()
    {
        $this->resetPage();
    }
}
