<?php

namespace App\Http\Livewire\Admin\Otros;

use App\Models\Escuela;
use App\Models\Facultad;
use Livewire\Component;
use Livewire\WithPagination;

class OtrosEscuelas extends Component
{
    use WithPagination;

    public $cantidad = 5, $search = '';
    public $abrir = false, $abrirEliminar = false, $nombreModal;
    public $facultades = null, $escu = null, $facultad = 0, $escuela_nombre;

    protected $rules = [
        'facultad' => 'required|gt:0',
        'escuela_nombre' => 'required|max:200'
    ];

    public function updatingCantidad()
    {
        $this->resetPage();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function abrirModalNuevo()
    {
        if (is_null($this->facultades)) {
            $this->facultades = Facultad::query()
                ->orderBy('nombre')
                ->get();
        }
        $this->escu = null;
        $this->nombreModal = "Crear nueva Escuela";
        $this->abrir = true;
    }

    public function abrirModalEditar($id)
    {
        if (is_null($this->facultades)) {
            $this->facultades = Facultad::query()
                ->orderBy('nombre')
                ->get();
        }

        $this->escu = Escuela::find($id);
        $this->escuela_nombre = $this->escu->nombre;
        $this->nombreModal = "Editar información de $this->escuela_nombre";
        $this->facultad = $this->escu->facultad_id;
        $this->abrir = true;
    }

    public function abrirModalEliminar($id)
    {
        $this->escu = Escuela::find($id);
        $this->escuela_nombre = $this->escu->nombre;
        $this->abrirEliminar = true;
    }

    public function eliminarEscuela()
    {
        try {
            $this->escu->delete();
            $this->emit('guardado', "Se ha eliminado la escuela llamada $this->escuela_nombre.");
        } catch (\Illuminate\Database\QueryException $e) {
            $this->emit('error', "No se puede eliminar la escuela $this->escuela_nombre porque tiene dependencias externas.");
        } finally {
            $this->reset(['escu', 'escuela_nombre', 'abrirEliminar']);
        }
    }

    public function crearEscuela()
    {
        $this->validate();

        if (is_null($this->escu)) {
            Escuela::create([
                'nombre' => $this->escuela_nombre,
                'abrev' => null,
                'facultad_id' => $this->facultad
            ]);
            $this->emit('guardado', "Se ha creado una nueva escuela llamado $this->escuela_nombre.");
        } else {
            $this->escu->nombre = $this->escuela_nombre;
            $this->escu->facultad_id = $this->facultad;
            $this->escu->save();
            $this->emit('guardado', "Se ha modificado los datos de la escuela $this->escuela_nombre.");
        }

        $this->reset(['escu', 'facultad', 'escuela_nombre', 'abrir']);
    }

    public function render()
    {
        $escuelas = Escuela::query()
            ->with('facultad')
            ->where('nombre', 'like', '%' . $this->search . '%')
            ->orWhereHas('facultad', function ($query) {
                return $query->where('nombre', 'like', '%' . $this->search . '%');
            })
            ->orderBy('nombre')
            ->paginate($this->cantidad);

        return view('livewire.admin.otros.otros-escuelas', compact('escuelas'));
    }
}
