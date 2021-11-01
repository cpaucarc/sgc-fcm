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
    public $ciclo_seleccionado = 1;
    public $ciclos;
    public $sld = null; //Salida seleccionda para mostrar en modal
    public $abrir = false;

    public function mount()
    {
        $this->ciclos = Ciclo::orderBy('nombre', 'asc')->get();
    }

    public function abrirModal($sld_id)
    {
        $this->sld = Salida::query()
            ->with(['documentos' => function ($query) {
                $query->where('ciclo_id', $this->ciclo_seleccionado);
            }])
            ->where('id', $sld_id)
            ->first();
        /*
        $this->ent_prv_seleccionado = EntradaProveedor::query()
            ->with('entrada', 'actividad')
            ->with(['documentos' => function ($query) {
                $query->where('ciclo_id', $this->ciclo_seleccionado);
            }])
            ->where('id', $ent_prv_id)
            ->first();
         * */
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
                        $entID = Auth::user()->roles->pluck('entidad_id');
                        $query->select('id')
                            ->from('clientes')
                            ->whereIn('entidad_id', $entID);
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
