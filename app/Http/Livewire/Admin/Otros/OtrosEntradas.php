<?php

namespace App\Http\Livewire\Admin\Otros;

use App\Models\Entrada;
use App\Models\Proceso;
use Livewire\Component;
use Livewire\WithPagination;

class OtrosEntradas extends Component
{
    use WithPagination;

    public $cantidad = 10, $search = '';
    public $procesos, $proceso_seleccionado;
    public $nombreModal = "", $abrir = false, $abrirEliminar = false;
    public $codigo_entrada, $nombre_entrada, $descripcion_entrada;
    public $entrada_seleccionado = null;

    protected $rules = [
        'codigo_entrada' => 'required',
        'nombre_entrada' => 'required|max:125',
        'descripcion_entrada' => 'nullable|max:200',
        'proceso_seleccionado' => 'required|gt:0'
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
        $entradas = Entrada::query()
            ->with('proceso')
            ->where('proceso_id', $this->proceso_seleccionado)
            ->where(function ($q) {
                return $q->where('codigo', 'like', '%' . $this->search . '%')
                    ->orWhere('nombre', 'like', '%' . $this->search . '%');
            })
            ->orderBy('nombre')
            ->paginate($this->cantidad);

        return view('livewire.admin.otros.otros-entradas', compact('entradas'));
    }

    /* Nuevo */
    public function abrirModalNuevo()
    {
        $this->nombreModal = "Crear una nueva Entrada";
        $this->abrir = true;
    }

    public function crearEntrada()
    {
        $this->validate();

        if (is_null($this->entrada_seleccionado)) {
            Entrada::create([
                'codigo' => strtoupper($this->codigo_entrada),
                'nombre' => $this->nombre_entrada,
                'descripcion' => $this->descripcion_entrada,
                'proceso_id' => $this->proceso_seleccionado
            ]);
            $this->emit('guardado', "Se ha creado una nueva entrada llamado $this->nombre_entrada.");
        } else {
            $this->entrada_seleccionado->codigo = strtoupper($this->codigo_entrada);
            $this->entrada_seleccionado->nombre = $this->nombre_entrada;
            $this->entrada_seleccionado->descripcion = $this->descripcion_entrada;
            $this->entrada_seleccionado->proceso_id = $this->proceso_seleccionado;
            $this->entrada_seleccionado->save();
            $this->emit('guardado', "Se ha modificado los datos de la entrada $this->nombre_entrada.");
        }

        $this->reset(['entrada_seleccionado', 'codigo_entrada', 'nombre_entrada', 'descripcion_entrada', 'abrir']);
    }

    /* Editar */
    public function abrirModalEditar($id)
    {
        $this->entrada_seleccionado = Entrada::find($id);
        $this->nombreModal = "Editar información de " . $this->entrada_seleccionado->nombre;
        $this->codigo_entrada = $this->entrada_seleccionado->codigo;
        $this->nombre_entrada = $this->entrada_seleccionado->nombre;
        $this->descripcion_entrada = $this->entrada_seleccionado->descripcion;
        $this->proceso_seleccionado = $this->entrada_seleccionado->proceso_id;
        $this->abrir = true;
    }

    /* Eliminar */
    public function abrirModalEliminar($id)
    {
        $this->entrada_seleccionado = Entrada::find($id);
        $this->nombreModal = $this->entrada_seleccionado->nombre;
        $this->abrirEliminar = true;
    }

    public function eliminarEntrada()
    {
        try {
            if (!is_null($this->entrada_seleccionado)) {
                $this->entrada_seleccionado->delete();
                $this->emit('guardado', "Se ha eliminado la entrada");
            }
        } catch (\Illuminate\Database\QueryException $e) {
            $this->emit('error', "No se puede eliminar la entrada " . $this->entrada_seleccionado->nombre . " porque tiene dependencias externas.");
        } finally {
            $this->reset(['entrada_seleccionado', 'nombreModal', 'abrirEliminar']);
        }
    }
}
