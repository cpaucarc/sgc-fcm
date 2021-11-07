<?php

namespace App\Http\Livewire\Admin\Entidades;

use App\Models\Actividad;
use App\Models\Cliente;
use App\Models\ClienteSalida;
use App\Models\Entrada;
use App\Models\EntradaProveedor;
use App\Models\Proceso;
use App\Models\Proveedor;
use App\Models\Salida;
use Livewire\Component;

class ListarClientes extends Component
{

    public $abrir = false;
    public $entidad_id;
    public $procesos = null, $actividades = null, $salidas = null, $salidas_no_asignadas = null;
    public $proceso_seleccionado = 0, $actividad_seleccionado = 0;
    public $selected = []; //salidas selected

    public function mount($id)
    {
        $this->entidad_id = $id;
    }

    public function guardar()
    {
        $cliente = Cliente::query()
            ->where('entidad_id', $this->entidad_id)
            ->first();

        if (!$cliente) {
            $cliente = Cliente::create([
                'codigo' => 'C' . $this->entidad_id,
                'entidad_id' => $this->entidad_id
            ]);
        }

        foreach ($this->selected as $sal_id) {
            $cli_sal[] = [
                'cliente_id' => $cliente->id,
                'salida_id' => $sal_id
            ];
        }

        ClienteSalida::insert($cli_sal);
        $this->emit('guardado', "Se han asignado " . count($this->selected) . " salidas para la actividad seleccionada");
        $this->reset(['selected', 'salidas_no_asignadas', 'actividades', 'proceso_seleccionado', 'actividad_seleccionado', 'abrir']);

    }

    public function eliminar($id)
    {
        $cs = ClienteSalida::find($id);
        $cs->delete();
        $this->reset(['selected', 'salidas_no_asignadas']);
        $this->emit('guardado', "Se ha quitado la salida");
    }

    public function render()
    {
        $this->salidas = ClienteSalida::query()
            ->with('salida')
            ->whereIn('cliente_id', function ($query) {
                $query->select('id')
                    ->from('clientes')
                    ->where('entidad_id', $this->entidad_id);
            })
            ->orderBy(Salida::select('nombre')
                ->whereColumn('salidas.id', 'cliente_salidas.salida_id')
            )
            ->get();

        $this->procesos = Proceso::query()
            ->withCount('actividades')
            ->having('actividades_count', '>', 0)
            ->orderBy('nombre')
            ->get();

        return view('livewire.admin.entidades.listar-clientes');
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
        $this->salidas_no_asignadas = null;

        if ($this->actividad_seleccionado > 0) {

            $ids = ClienteSalida::query()
                ->where('cliente_id', function ($query) {
                    $query->select('id')
                        ->from('clientes')
                        ->where('entidad_id', $this->entidad_id);
                })
                ->whereIn('salida_id', function ($query) {
                    $query->select('id')
                        ->from('salidas')
                        ->where('actividad_id', $this->actividad_seleccionado);
                })
                ->pluck('salida_id');

            if (is_null($this->salidas_no_asignadas)) {
                $this->salidas_no_asignadas = Salida::query()
                    ->with('actividad')
                    ->whereNotIn('id', $ids)
                    ->where('actividad_id', $this->actividad_seleccionado)
                    ->orderBy('nombre')
                    ->get();
            }
        }
    }

}
