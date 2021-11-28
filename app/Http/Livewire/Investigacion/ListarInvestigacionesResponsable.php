<?php

namespace App\Http\Livewire\Investigacion;

use App\Models\InvestigadorInvestigacion;
use Livewire\Component;
use Livewire\WithPagination;

class ListarInvestigacionesResponsable extends Component
{
    use WithPagination;

    public function render()
    {
        $persona_id = auth()->user()->persona_id;

        $investigaciones = InvestigadorInvestigacion::query()
            ->with('investigacion')
            ->whereIn('investigador_id', function ($query) use ($persona_id) {
                return $query->select('id')
                    ->from('investigadores')
                    ->where('estudiante_id', function ($q) use ($persona_id) {
                        return $q->select('id')->from('estudiantes')->where('persona_id', $persona_id);
                    })
                    ->orWhere('docente_id', function ($q) use ($persona_id) {
                        return $q->select('id')->from('docentes')->where('persona_id', $persona_id);
                    });
            })
            ->paginate(10);


//select * from investigador_investigacion
//where investigador_id in (select id from investigadores
//      where estudiante_id = (select id from estudiantes where persona_id = 102)
//      or docente_id = (select id from docentes where persona_id = 102));


        return view('livewire.investigacion.listar-investigaciones-responsable', compact('investigaciones'));
    }
}
