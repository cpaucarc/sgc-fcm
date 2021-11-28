<?php

namespace App\Http\Livewire\Admin\Otros;

use App\Models\Actividad;
use App\Models\Proceso;
use App\Models\TipoActividad;
use Livewire\Component;
use Livewire\WithPagination;

class OtrosActividades extends Component
{
    use WithPagination;

    public $cantidad = 10, $search = '';
    public $procesos, $proceso_seleccionado;
    public $tipos = null, $tipo_seleccionado;
    public $nombreModal = "", $abrir = false, $abrirEliminar = false;
    public $nombre_actividad;
    public $actividad_seleccionado = null;

    protected $rules = [
        'nombre_actividad' => 'required',
        'tipo_seleccionado' => 'required|gt:0',
        'proceso_seleccionado' => 'required|gt:0',
    ];

    public function mount()
    {
        $this->procesos = Proceso::query()->orderBy('nombre')->get();
        $this->proceso_seleccionado = $this->procesos->first()->id ?? 0;
        $this->tipos = TipoActividad::query()->orderBy('nombre')->get();
    }

    public function updatingCantidad()
    {
        $this->resetPage();
    }

    public function updatingProcesoSeleccionado()
    {
        $this->resetPage();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $actividades = Actividad::query()
            ->with('tipoActividad')
            ->where('nombre', 'like', '%' . $this->search . '%')
            ->where('proceso_id', $this->proceso_seleccionado)
            ->paginate($this->cantidad);

        return view('livewire.admin.otros.otros-actividades', compact('actividades'));
    }

    /* Nuevo */
    public function abrirModalNuevo()
    {
        $this->nombreModal = "Crear una nueva Actividad";
        $this->abrir = true;
    }

    public function crearActividad()
    {
        $this->validate();

        if (is_null($this->actividad_seleccionado)) {
            Actividad::create([
                'nombre' => $this->nombre_actividad,
                'tipo_actividad_id' => $this->tipo_seleccionado,
                'proceso_id' => $this->proceso_seleccionado
            ]);
            $this->emit('guardado', "Se ha creado una nueva actividad llamado $this->nombre_actividad.");
        } else {
            $this->actividad_seleccionado->nombre = $this->nombre_actividad;
            $this->actividad_seleccionado->tipo_actividad_id = $this->tipo_seleccionado;
            $this->actividad_seleccionado->proceso_id = $this->proceso_seleccionado;
            $this->actividad_seleccionado->save();
            $this->emit('guardado', "Se ha modificado los datos de la actividad $this->nombre_actividad.");
        }

        $this->reset(['actividad_seleccionado', 'nombre_actividad', 'tipo_seleccionado', 'abrir']);
    }

    /* Editar */
    public function abrirModalEditar($id)
    {
        $this->actividad_seleccionado = Actividad::find($id);
        $this->nombreModal = "Editar información de " . $this->actividad_seleccionado->nombre;
        $this->nombre_actividad = $this->actividad_seleccionado->nombre;
        $this->tipo_seleccionado = $this->actividad_seleccionado->tipo_actividad_id;
        $this->proceso_seleccionado = $this->actividad_seleccionado->proceso_id;
        $this->abrir = true;
    }

    /* Eliminar */
    public function abrirModalEliminar($id)
    {
        $this->actividad_seleccionado = Actividad::find($id);
        $this->nombreModal = $this->actividad_seleccionado->nombre;
        $this->abrirEliminar = true;
    }

    public function eliminarActividad()
    {
        try {
            if (!is_null($this->actividad_seleccionado)) {
                $this->actividad_seleccionado->delete();
                $this->emit('guardado', "Se ha eliminado la actividad");
            }
        } catch (\Illuminate\Database\QueryException $e) {
            $this->emit('error', "No se puede eliminar la actividad " . $this->actividad_seleccionado->nombre . " porque tiene dependencias externas.");
        } finally {
            $this->reset(['actividad_seleccionado', 'nombreModal', 'abrirEliminar']);
        }
    }
}
