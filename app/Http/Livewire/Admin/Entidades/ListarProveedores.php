<?php

namespace App\Http\Livewire\Admin\Entidades;

use App\Models\Actividad;
use App\Models\Entrada;
use App\Models\EntradaProveedor;
use App\Models\Proceso;
use App\Models\Proveedor;
use Livewire\Component;

class ListarProveedores extends Component
{
    public $abrir = false;
    public $entidad_id;
    public $procesos = null, $actividades = null, $entradas = null, $entradas_no_asignadas = null;
    public $proceso_seleccionado = 0, $actividad_seleccionado = 0;
    public $selected = []; //entradas selected

    public function mount($id)
    {
        $this->entidad_id = $id;
    }

    public function abrirModal()
    {

        $this->abrir = true;
    }

    public function guardar()
    {
        $proveedor = Proveedor::query()
            ->where('entidad_id', $this->entidad_id)
            ->first();

        if (!$proveedor) {
            $proveedor = Proveedor::create([
                'codigo' => 'P' . $this->entidad_id,
                'entidad_id' => $this->entidad_id
            ]);
        }

        foreach ($this->selected as $ent_id) {
            $ent_prov[] = [
                'proveedor_id' => $proveedor->id,
                'actividad_id' => $this->actividad_seleccionado,
                'entrada_id' => intval($ent_id),
            ];
        }

        EntradaProveedor::insert($ent_prov);
        $this->emit('guardado', "Se han asignado " . count($this->selected) . " entradas para la actividad seleccionada");
        $this->reset(['selected', 'entradas_no_asignadas', 'actividades', 'proceso_seleccionado', 'actividad_seleccionado', 'abrir']);

    }

    public function eliminar($id)
    {
        $ep = EntradaProveedor::find($id);
        $ep->delete();
        $this->reset(['selected', 'entradas_no_asignadas']);
        $this->emit('guardado', "Se ha quitado la entrada");
    }

    public function render()
    {
        $this->entradas = EntradaProveedor::query()
            ->with('entrada', 'actividad')
            ->whereIn('proveedor_id', function ($query) {
                $query->select('id')
                    ->from('proveedores')
                    ->where('entidad_id', $this->entidad_id);
            })
            ->orderBy(Entrada::select('nombre')
                ->whereColumn('entradas.id', 'entrada_proveedores.entrada_id')
            )
            ->get();

        $this->procesos = Proceso::query()
            ->withCount('actividades')
            ->having('actividades_count', '>', 0)
            ->orderBy('nombre')
            ->get();

        return view('livewire.admin.entidades.listar-proveedores');
    }

    //Eventos
    public function updatedProcesoSeleccionado()
    {
        $this->actividad_seleccionado = 0;
        $this->actividades = $this->proceso_seleccionado > 0 ? Actividad::query()
            ->where('proceso_id', $this->proceso_seleccionado)
            ->orderBy('nombre')
            ->get() : null;
    }

    public function updatedActividadSeleccionado()
    {
        $this->entradas_no_asignadas = null;

        if ($this->actividad_seleccionado > 0) {

            $ids = EntradaProveedor::query()
                ->where('proveedor_id', function ($query) {
                    $query->select('id')
                        ->from('proveedores')
                        ->where('entidad_id', $this->entidad_id);
                })
                ->where('actividad_id', $this->actividad_seleccionado)
                ->pluck('entrada_id');

            if (is_null($this->entradas_no_asignadas)) {
                $this->entradas_no_asignadas = Entrada::query()
                    ->with('proceso')
                    ->whereNotIn('id', $ids)
                    ->where('proceso_id', $this->proceso_seleccionado)
                    ->orderBy('nombre')
                    ->get();
            }
        }
    }

}
