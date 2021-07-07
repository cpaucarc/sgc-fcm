<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\ActividadResponsable;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ActividadesIncompletas extends Component
{
    public function render()
    {
        $oficina_id = Auth::user()->oficina->entidad->responsable->id;
        $actividades = ActividadResponsable::select('actividades.id', 'actividades.nombre AS actividad', 'actividades.estado', 'procesos.nombre AS proceso')
            ->join('actividades', 'actividades.id', '=', 'actividad_responsables.actividad_id')
            ->join('procesos', 'procesos.id', '=', 'actividades.proceso_id')
            ->where('actividad_responsables.responsable_id', '=', $oficina_id)
            ->get();

        $completos = ($actividades->where('estado', 1))->count();
        $incompletos = ($actividades->where('estado', 0))->count();
        $porcentaje = $incompletos === 0 ? 0 : ($completos / $incompletos * 100);

        return view('livewire.dashboard.actividades-incompletas')
            ->with(compact('actividades', 'completos', 'incompletos', 'porcentaje'));
    }
}
