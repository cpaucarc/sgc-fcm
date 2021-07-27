<?php

namespace App\Http\Livewire\Actividad;

use App\Models\Ciclo;
use App\Models\EntradaProveedor;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Proveer extends Component
{
    public $ciclo_seleccionado = 1;
    public $ent_prv_seleccionado = null;
    public $abrir = false;
    public $ciclos;

    public function abrirModal(EntradaProveedor $ent_prv)
    {
        $this->ent_prv_seleccionado = $ent_prv;
        $this->abrir = true;
    }

    public function render()
    {
        $proveedor = array();
        foreach (Auth::user()->roles as $rol) {
            array_push($proveedor, $rol->entidad->proveedor->id);
        }

        $ent_prov = EntradaProveedor::select('entrada_proveedores.id as id', 'entradas.codigo as codigo', 'entradas.nombre as entrada', 'actividades.nombre as actividad')
            ->selectRaw("IF((SELECT count(1) FROM entrada_completos WHERE ciclo_id = " . $this->ciclo_seleccionado . " and entrada_proveedor_id = entrada_proveedores.id), 1, 0 ) as status")
            ->join('entradas', 'entradas.id', '=', 'entrada_proveedores.entrada_id')
            ->join('actividades', 'actividades.id', '=', 'entrada_proveedores.actividad_id')
            ->whereIn('entrada_proveedores.proveedor_id', $proveedor)
            ->get();

        $completos = ($ent_prov->where('status', 1))->count();
        $incompletos = ($ent_prov->where('status', 0))->count();
        $porcentaje = $incompletos === 0 ? 0 : ($completos / $incompletos * 100);

        $this->ciclos = Ciclo::orderBy('nombre', 'asc')->get();
        return view('livewire.actividad.proveer')
            ->with(compact('proveedor', 'ent_prov', 'completos', 'incompletos', 'porcentaje'));
    }
}
