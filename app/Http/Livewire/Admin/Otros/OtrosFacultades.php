<?php

namespace App\Http\Livewire\Admin\Otros;

use App\Models\Facultad;
use Livewire\Component;
use Livewire\WithPagination;

class OtrosFacultades extends Component
{
    use WithPagination;

    public $cantidad = 5, $search = '';
    public $abrir = false, $abrirEliminar = false, $nombreModal;
    public $facu = null, $fac_nombre, $fac_direccion, $fac_abrev;

    protected $rules = [
        'fac_nombre' => 'required|max:200',
        'fac_direccion' => 'required|max:220',
        'fac_abrev' => 'required|max:10'
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
        $this->facu = null;
        $this->nombreModal = "Crear nueva Facultad";
        $this->abrir = true;
    }

    public function abrirModalEditar($id)
    {
        $this->facu = Facultad::find($id);
        $this->fac_nombre = $this->facu->nombre;
        $this->fac_direccion = $this->facu->direccion;
        $this->fac_abrev = $this->facu->abrev;
        $this->nombreModal = "Editar información de $this->fac_nombre";
        $this->abrir = true;
    }

    public function abrirModalEliminar($id)
    {
        $this->facu = Facultad::find($id);
        $this->fac_nombre = $this->facu->nombre;
        $this->abrirEliminar = true;
    }

    public function eliminarFacultad()
    {
        try {
            $this->facu->delete();
            $this->emit('guardado', "Se ha eliminado la facultad llamado $this->fac_nombre.");
        } catch (\Illuminate\Database\QueryException $e) {
            $this->emit('error', "No se puede eliminar la facultad $this->fac_nombre porque tiene dependencias externas.");
        } finally {
            $this->reset(['facu', 'fac_nombre', 'abrirEliminar']);
        }
    }

    public function crearFacultad()
    {
        $this->validate();

        if (is_null($this->facu)) {
            Facultad::create([
                'nombre' => $this->fac_nombre,
                'direccion' => $this->fac_direccion,
                'abrev' => strtoupper($this->fac_abrev)
            ]);
            $this->emit('guardado', "Se ha creado una nueva facultad llamado $this->fac_nombre.");
        } else {
            $this->facu->nombre = $this->fac_nombre;
            $this->facu->direccion = $this->fac_direccion;
            $this->facu->abrev = strtoupper($this->fac_abrev);
            $this->facu->save();
            $this->emit('guardado', "Se ha modificado los datos de la facultad $this->fac_nombre.");
        }

        $this->reset(['facu', 'fac_nombre', 'fac_direccion', 'fac_abrev', 'abrir']);
    }

    public function render()
    {
        $facultades = Facultad::query()
            ->where('nombre', 'like', '%' . $this->search . '%')
            ->orWhere('direccion', 'like', '%' . $this->search . '%')
            ->orWhere('abrev', 'like', '%' . $this->search . '%')
            ->orderBy('nombre')
            ->paginate($this->cantidad);

        return view('livewire.admin.otros.otros-facultades', compact('facultades'));
    }

}
