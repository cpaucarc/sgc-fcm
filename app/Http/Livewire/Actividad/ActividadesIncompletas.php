<?php

namespace App\Http\Livewire\Actividad;

use App\Models\Actividad;
use App\Models\ActividadResponsable;
use App\Models\Ciclo;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ActividadesIncompletas extends Component
{
    public $ciclo_seleccionado = 1;
    public $ciclos;

    public function render()
    {
        $respsID = array();
        foreach (Auth::user()->roles as $rol) {
            array_push($respsID, $rol->entidad->responsable->id);
        }

        $actividades = ActividadResponsable::select('actividades.id', 'actividades.nombre AS actividad', 'procesos.nombre AS proceso', 'responsables.codigo as codigo', 'entidades.nombre as entidad')
            ->selectRaw("IF((SELECT count(1) FROM actividad_completos WHERE ciclo_id = " . $this->ciclo_seleccionado . " and actividad_id = actividades.id), 1, 0 ) as status")
            ->join('actividades', 'actividades.id', '=', 'actividad_responsables.actividad_id')
            ->join('procesos', 'procesos.id', '=', 'actividades.proceso_id')
            ->join('responsables', 'responsables.id', '=', 'actividad_responsables.responsable_id')
            ->join('entidades', 'entidades.id', '=', 'responsables.entidad_id')
            ->whereIn('actividad_responsables.responsable_id', $respsID)
            ->get();

        $completos = ($actividades->where('status', 1))->count();
        $total = ($actividades)->count();
        $porcentaje = $completos === 0 ? 0 : ($completos / $total * 100);

        $this->ciclos = Ciclo::orderBy('nombre', 'asc')->get();

        return view('livewire.actividad.actividades-incompletas')
            ->with(compact('actividades', 'completos', 'total', 'porcentaje'));
    }
}
