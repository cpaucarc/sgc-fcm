<?php

namespace App\Http\Livewire\Admin\Entidades;

use App\Models\Actividad;
use App\Models\ActividadResponsable;
use App\Models\Entidad;
use App\Models\Responsable;
use Livewire\Component;

class ListarResponsables extends Component
{
    public $abrir = false;
    public $actividades, $actividades_no_asignadas = null;
    public $selected = [];
    public $entidad_id;

    public function mount($id)
    {
        $this->entidad_id = $id;
    }

    public function abrirModal()
    {
        $ids = $this->actividades->pluck('actividad.id');
        if (is_null($this->actividades_no_asignadas)) {
            $this->actividades_no_asignadas = Actividad::query()
                ->with('proceso', 'tipoActividad')
                ->whereNotIn('id', $ids)
                ->orderBy('nombre')
                ->get();
        }
        $this->abrir = true;
    }

    public function guardar()
    {
        $responsable = Responsable::query()
            ->where('entidad_id', $this->entidad_id)
            ->first();

        if (!$responsable) {
            $responsable = Responsable::create([
                'codigo' => 'R' . $this->entidad_id,
                'entidad_id' => $this->entidad_id
            ]);
        }

        foreach ($this->selected as $act_id) {
            $act_res[] = [
                'responsable_id' => $responsable->id,
                'actividad_id' => intval($act_id)
            ];
        }

        ActividadResponsable::insert($act_res);
        $this->emit('guardado', "Se han asignado " . count($this->selected) . " actividades a esta entidad");
        $this->reset(['selected', 'actividades_no_asignadas', 'abrir']);

    }

    public function eliminar($id)
    {
        $ar = ActividadResponsable::find($id);
        $ar->delete();
        $this->reset(['selected', 'actividades_no_asignadas']);
        $this->emit('guardado', "Se ha quitado la actividad");
    }

    public function render()
    {
        $this->actividades = ActividadResponsable::query()
            ->with('actividad')
            ->whereIn('responsable_id', function ($query) {
                $query->select('id')
                    ->from('responsables')
                    ->where('entidad_id', $this->entidad_id);
            })
            ->orderBy(Actividad::select('nombre')
                ->whereColumn('actividades.id', 'actividad_responsables.actividad_id')
            )
            ->get();

        return view('livewire.admin.entidades.listar-responsables');
    }
}
