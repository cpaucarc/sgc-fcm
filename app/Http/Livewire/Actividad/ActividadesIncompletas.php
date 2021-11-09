<?php

namespace App\Http\Livewire\Actividad;

use App\Models\Actividad;
use App\Models\ActividadCompleto;
use App\Models\ActividadResponsable;
use App\Models\Ciclo;
use App\Models\Proceso;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ActividadesIncompletas extends Component
{
    public $ciclo_seleccionado = 1; // Este parametro viene desde index
    public $responsable_id = null; // Este parametro viene desde index
    public $proceso_seleccionado = 1;
    public $procesos = null;

    public $listeners = [
        'cicloCambiado' => 'cicloCambiado'
    ];

    public function mount($ciclo_id, $responsable_id)
    {
        $this->ciclo_seleccionado = $ciclo_id;
        $this->responsable_id = $responsable_id;

        $this->procesos = Proceso::query()
            ->whereIn('id', function ($q1) {
                $q1->select('proceso_id')
                    ->from('actividades')
                    ->whereIn('id', function ($q2) {
                        $q2->select('actividad_id')
                            ->from('actividad_responsables')
                            ->whereIn('responsable_id', $this->responsable_id);
                    });
            })
            ->orderBy('nombre')
            ->get();
        $this->proceso_seleccionado = $this->procesos->first()->id;
    }

    public function cicloCambiado($ciclo_id)
    {
        $this->ciclo_seleccionado = $ciclo_id;
    }

    public function render()
    {
        $conteo = ActividadCompleto::toBase()
            ->selectRaw("COUNT(*) as completado")
            ->addSelect(["total" => ActividadResponsable::select(DB::raw('count(1)'))
                ->whereIn('responsable_id', $this->responsable_id)
                ->whereIn('actividad_id', function ($q1) {
                    $q1->select('id')
                        ->from('actividades')
                        ->where('proceso_id', $this->proceso_seleccionado);
                })
                ->take(1)
            ])
            ->where('ciclo_id', $this->ciclo_seleccionado)
            ->whereIn('actividad_id', function ($q) {
                $q->select('id')
                    ->from('actividades')
                    ->where('proceso_id', $this->proceso_seleccionado)
                    ->whereIn('id', function ($q2) {
                        $q2->select('actividad_id')
                            ->from('actividad_responsables')
                            ->whereIn('responsable_id', $this->responsable_id);
                    });
            })
            ->first();

        $actividades = ActividadResponsable::query()
            ->select('actividades.id', 'actividades.nombre AS actividad', 'procesos.nombre AS proceso', 'responsables.codigo as codigo', 'entidades.nombre as entidad')
            ->selectRaw("IF((SELECT count(1) FROM actividad_completos WHERE ciclo_id = " . $this->ciclo_seleccionado . " and actividad_id = actividades.id), 1, 0 ) as status")
            ->join('actividades', 'actividades.id', '=', 'actividad_responsables.actividad_id')
            ->join('procesos', 'procesos.id', '=', 'actividades.proceso_id')
            ->join('responsables', 'responsables.id', '=', 'actividad_responsables.responsable_id')
            ->join('entidades', 'entidades.id', '=', 'responsables.entidad_id')
            ->whereIn('actividad_responsables.responsable_id', $this->responsable_id)
            ->where('procesos.id', $this->proceso_seleccionado)
            ->get();

        return view('livewire.actividad.actividades-incompletas')
            ->with(compact('actividades', 'conteo'));
    }
}
