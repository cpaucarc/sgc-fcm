<?php

namespace App\Http\Livewire\Actividad;

use App\Models\Ciclo;
use App\Models\SalidaCompleto;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DocumentosRecibidos extends Component
{
    public $ciclo_seleccionado = 1;
    public $ciclos;

    public function render()
    {
        $this->ciclos = Ciclo::orderBy('nombre', 'asc')->get();


        $salida_completo = SalidaCompleto::where('ciclo_id', $this->ciclo_seleccionado)
            ->whereIn('salida_id', function ($query) {
                $query->select('salida_id')
                    ->from('cliente_salidas')
                    ->whereIn('cliente_id', function ($query) {
                        $entID = array();
                        foreach (Auth::user()->roles as $rol) {
                            array_push($entID, $rol->entidad->id);
                        }

                        $query->select('id')
                            ->from('clientes')
                            ->whereIn('entidad_id', $entID);
                    });
            })
            ->get();


        return view('livewire.actividad.documentos-recibidos')
            ->with(compact('salida_completo'));
    }
}
