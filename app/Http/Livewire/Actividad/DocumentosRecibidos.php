<?php

namespace App\Http\Livewire\Actividad;

use App\Models\Ciclo;
use App\Models\Salida;
use App\Models\SalidaCompleto;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DocumentosRecibidos extends Component
{
    public $ciclo_seleccionado = 1;
    public $ciclos;
    public $sld = null; //Salida seleccionda para mostrar en modal
    public $abrir = false;


    public function abrirModal(Salida $sld)
    {
        $this->sld = $sld;
        $this->abrir = true;
    }

    public function render()
    {
        $this->ciclos = Ciclo::orderBy('nombre', 'asc')->get();


        $salidas = Salida::whereIn('id', function ($query) {
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

        /*
select
	*,
    (select count(*) from salida_completos where ciclo_id = 1 and salida_id = salidas.id) as conteo
from salidas
where id in (select salida_id from cliente_salidas where cliente_id in (1, 3))
and (select count(*) from salida_completos where ciclo_id = 1 and salida_id = salidas.id) > 0
;
         * */


        return view('livewire.actividad.documentos-recibidos')
            ->with(compact('salidas'));
    }
}
