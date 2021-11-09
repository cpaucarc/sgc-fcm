<?php

namespace App\Http\Livewire\Actividad;

use App\Models\Ciclo;
use App\Models\Salida;
use App\Models\SalidaCompleto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DocumentosRecibidos extends Component
{
    public $ciclo_seleccionado = 1, $entidad_id = null;
    public $ciclos;
    public $sld = null; //Salida seleccionda para mostrar en modal
    public $abrir = false;

    public $listeners = [
        'cicloCambiado' => 'cicloCambiado'
    ];

    public function mount($ciclo_id, $entidad_id)
    {
        $this->ciclo_seleccionado = $ciclo_id;
        $this->entidad_id = $entidad_id;
    }

    public function cicloCambiado($ciclo_id)
    {
        $this->ciclo_seleccionado = $ciclo_id;
    }

    public function abrirModal($sld_id)
    {
        $this->sld = Salida::query()
            ->with(['documentos' => function ($query) {
                $query->where('ciclo_id', $this->ciclo_seleccionado);
            }])
            ->where('id', $sld_id)
            ->first();
        $this->abrir = true;
    }

    public function render()
    {
        $salidas = Salida::query()
            ->addSelect(['cantidad' => SalidaCompleto::select(DB::raw('count(1)'))
                ->whereColumn('salida_id', 'salidas.id')
                ->where('ciclo_id', $this->ciclo_seleccionado)
                ->limit(1)
            ])
            ->with('actividad')
            ->whereIn('id', function ($query) {
                $query->select('salida_id')
                    ->from('cliente_salidas')
                    ->whereIn('cliente_id', function ($query) {
                        $query->select('id')
                            ->from('clientes')
                            ->whereIn('entidad_id', $this->entidad_id);
                    });
            })
            ->whereIn('id', function ($query) {
                $query->select('salida_id')
                    ->from('salida_completos')
                    ->where('ciclo_id', $this->ciclo_seleccionado);
            })
            ->get();

        return view('livewire.actividad.documentos-recibidos')
            ->with(compact('salidas'));
    }
}
