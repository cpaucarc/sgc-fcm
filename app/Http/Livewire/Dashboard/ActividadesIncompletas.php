<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\ActividadResponsable;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ActividadesIncompletas extends Component
{
    public function render()
    {
        $oficina_id = Auth::user()->oficina_id;
        $actividades = ActividadResponsable::select('actividad_responsables.id', 'actividades.nombre AS actividad', 'actividades.estado', 'procesos.nombre AS proceso')
            ->join('actividades', 'actividades.id', '=', 'actividad_responsables.actividad_id')
            ->join('procesos', 'procesos.id', '=', 'actividades.proceso_id')
            ->where('actividad_responsables.responsable_id', '=', $oficina_id)
            ->get();

        $completos = ($actividades->where('estado', 1))->count();
        $incompletos = ($actividades->where('estado', 0))->count();

        return view('livewire.dashboard.actividades-incompletas')
            ->with(compact('actividades'))
            ->with(compact('completos'))
            ->with(compact('incompletos'));
    }
}
