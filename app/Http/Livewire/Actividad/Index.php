<?php

namespace App\Http\Livewire\Actividad;

use App\Models\Actividad;
use App\Models\ActividadCompleto;
use App\Models\ActividadResponsable;
use App\Models\Ciclo;
use App\Models\ClienteSalida;
use App\Models\EntradaCompleto;
use App\Models\EntradaProveedor;
use App\Models\SalidaCompleto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Index extends Component
{
    public $show_mis_actividades = false;   // num = 1
    public $show_proveer = false;           // num = 2
    public $show_documentos_recibidos = false; // num = 3
    public $ciclos = null, $ciclo_seleccionado = 1;
    public $responsable_id = null, $entidad_id = null;

    public function mount()
    {
        $this->show_mis_actividades = true;
//        $this->show_documentos_recibidos = true;
        $this->responsable_id = Auth::user()->trabajo->pluck('entidad.responsable.id');
        $this->entidad_id = Auth::user()->trabajo->pluck('entidad_id');
        $this->ciclos = Ciclo::all();
        $this->ciclo_seleccionado = $this->ciclos->last()->id;
    }

    public function updatedCicloSeleccionado()
    {
        $this->emit('cicloCambiado', $this->ciclo_seleccionado);

    }

    public function cambiarVista($num)
    {
        $this->resetear();
        switch ($num) {
            case 1:
                $this->show_mis_actividades = true;
                break;
            case 2:
                $this->show_proveer = true;
                break;
            case 3:
                $this->show_documentos_recibidos = true;
                break;
        }
    }

    public function resetear()
    {
        $this->reset([
            'show_mis_actividades',
            'show_proveer',
            'show_documentos_recibidos'
        ]);
    }

    public function conteoDeCompletados()
    {
        if ($this->show_mis_actividades)
            return ActividadCompleto::toBase()
                ->selectRaw("'Actividades completadas' as msg")
                ->selectRaw("'purple' as color")
                ->selectRaw("COUNT(*) as completado")
                ->addSelect(["total" => ActividadResponsable::select(DB::raw('count(1)'))
                    ->whereIn('responsable_id', $this->responsable_id)
                    ->take(1)
                ])
                ->where('ciclo_id', $this->ciclo_seleccionado)
                ->whereIn('actividad_id', function ($q) {
                    $q->select('actividad_id')
                        ->from('actividad_responsables')
                        ->whereIn('responsable_id', $this->responsable_id);
                })
                ->first();
        elseif ($this->show_proveer) {
            return EntradaCompleto::toBase()
                ->selectRaw("'Entradas completadas' as msg")
                ->selectRaw("'orange' as color")
                ->selectRaw("COUNT(*) as completado")
                ->addSelect(["total" => EntradaProveedor::select(DB::raw('count(1)'))
                    ->whereIn('proveedor_id', function ($q) {
                        $q->select('id')
                            ->from('proveedores')
                            ->whereIn('entidad_id', $this->entidad_id);
                    })
                    ->take(1)
                ])
                ->where('ciclo_id', $this->ciclo_seleccionado)
                ->whereIn('entrada_proveedor_id', function ($q) {
                    $q->select('id')
                        ->from('entrada_proveedores')
                        ->whereIn('proveedor_id', function ($q) {
                            $q->select('id')
                                ->from('proveedores')
                                ->whereIn('entidad_id', $this->entidad_id);
                        });
                })
                ->first();
        } else {
            return SalidaCompleto::toBase()
                ->selectRaw("'Salidas recibidas' as msg")
                ->selectRaw("'lime' as color")
                ->selectRaw("COUNT(*) as completado")
                ->addSelect(["total" => ClienteSalida::select(DB::raw('count(1)'))
                    ->whereIn('cliente_id', function ($q) {
                        $q->select('id')
                            ->from('clientes')
                            ->whereIn('entidad_id', $this->entidad_id);
                    })
                    ->take(1)
                ])
                ->where('ciclo_id', $this->ciclo_seleccionado)
                ->whereIn('salida_id', function ($q) {
                    $q->select('salida_id')
                        ->from('cliente_salidas')
                        ->whereIn('cliente_id', function ($q) {
                            $q->select('id')
                                ->from('clientes')
                                ->whereIn('entidad_id', $this->entidad_id);
                        });
                })
                ->first();
        }
    }

    public function render()
    {
        $conteo = $this->conteoDeCompletados();
        return view('livewire.actividad.index', compact('conteo'));
    }
}
