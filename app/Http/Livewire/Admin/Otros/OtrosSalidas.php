<?php

namespace App\Http\Livewire\Admin\Otros;

use App\Models\Actividad;
use App\Models\Proceso;
use App\Models\Salida;
use Livewire\Component;
use Livewire\WithPagination;

class OtrosSalidas extends Component
{
    use WithPagination;

    public $cantidad = 10, $search = '';
    public $procesos, $proceso_seleccionado;
    public $nombreModal = "", $abrir = false, $abrirEliminar = false;
    public $codigo_salida, $nombre_salida, $descripcion_salida;
    public $actividades = null, $actividad_seleccionado = 0;
    public $salida_seleccionado = null;

    protected $rules = [
        'codigo_salida' => 'required',
        'nombre_salida' => 'required|max:125',
        'descripcion_salida' => 'nullable|max:200',
        'actividad_seleccionado' => 'required|gt:0'
    ];

    public function mount()
    {
        $this->procesos = Proceso::query()->orderBy('nombre')->get();
        $this->proceso_seleccionado = $this->procesos->first()->id ?? 0;
    }

    public function updatingCantidad()
    {
        $this->resetPage();
    }

    public function updatedProcesoSeleccionado()
    {
//        $this->resetPage();
        $this->consultarActividades();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $salidas = Salida::query()
            ->with('actividad')
            ->where(function ($query) {
                return $query->where('nombre', 'like', '%' . $this->search . '%')
                    ->orWhereHas('actividad', function ($q) {
                        return $q->where('nombre', 'like', '%' . $this->search . '%');
                    });
            })
            ->whereHas('actividad', function ($q) {
                return $q->where('proceso_id', $this->proceso_seleccionado);
            })
            ->orderBy('nombre')
            ->paginate($this->cantidad);

        return view('livewire.admin.otros.otros-salidas', compact('salidas'));
    }

    public function consultarActividades()
    {
        if ($this->proceso_seleccionado > 0) {
            $this->actividades = Actividad::query()->where('proceso_id', $this->proceso_seleccionado)->get();
            $this->actividad_seleccionado = 0;
        }
    }

    /* Nuevo */
    public function abrirModalNuevo()
    {
        $this->nombreModal = "Crear una nueva Entrada";
        $this->abrir = true;
    }

    public function crearSalida()
    {
        $this->validate();

        if (is_null($this->salida_seleccionado)) {
            Salida::create([
                'codigo' => strtoupper($this->codigo_salida),
                'nombre' => $this->nombre_salida,
                'descripcion' => $this->descripcion_salida,
                'actividad_id' => $this->actividad_seleccionado
            ]);
            //id, codigo, nombre, descripcion, actividad_id, id, id
            $this->emit('guardado', "Se ha creado una nueva salida llamado $this->nombre_salida.");
        } else {
            $this->salida_seleccionado->codigo = strtoupper($this->codigo_salida);
            $this->salida_seleccionado->nombre = $this->nombre_salida;
            $this->salida_seleccionado->descripcion = $this->descripcion_salida;
            $this->salida_seleccionado->actividad_id = $this->actividad_seleccionado;
            $this->salida_seleccionado->save();
            $this->emit('guardado', "Se ha modificado los datos de la salida $this->nombre_salida.");
        }

        $this->reset(['salida_seleccionado', 'codigo_salida', 'nombre_salida', 'descripcion_salida', 'actividad_seleccionado', 'abrir']);
    }

    /* Editar */
    public function abrirModalEditar($id)
    {
        $this->salida_seleccionado = Salida::find($id);
        $this->nombreModal = "Editar información de " . $this->salida_seleccionado->nombre;
        $this->codigo_salida = $this->salida_seleccionado->codigo;
        $this->nombre_salida = $this->salida_seleccionado->nombre;
        $this->descripcion_salida = $this->salida_seleccionado->descripcion;
        $this->actividad_seleccionado = $this->salida_seleccionado->actividad_id;
        $this->abrir = true;
    }

    /* Eliminar */
    public function abrirModalEliminar($id)
    {
        $this->salida_seleccionado = Salida::find($id);
        $this->nombreModal = $this->salida_seleccionado->nombre;
        $this->abrirEliminar = true;
    }

    public function eliminarEntrada()
    {
        try {
            if (!is_null($this->salida_seleccionado)) {
                $this->salida_seleccionado->delete();
                $this->emit('guardado', "Se ha eliminado la salida");
            }
        } catch (\Illuminate\Database\QueryException $e) {
            $this->emit('error', "No se puede eliminar la salida " . $this->salida_seleccionado->nombre . " porque tiene dependencias externas.");
        } finally {
            $this->reset(['salida_seleccionado', 'nombreModal', 'abrirEliminar']);
        }
    }
}
