<?php

namespace App\Http\Livewire\Rrss;

use App\Models\ParticipanteRRSS;
use App\Models\ResponsabilidadSocial;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ListarRrssResponsable extends Component
{
    use WithPagination;

    public function render()
    {
        $persona_id = auth()->user()->persona_id;
        $rsu = ResponsabilidadSocial::query()
            ->with('empresa')
            ->addSelect(['es_participante' => ParticipanteRRSS::select(DB::raw('true'))
                ->whereColumn('responsabilidad_social_id', 'responsabilidad_social.id')
                ->take(1)
            ])
            ->where('docente_responsable_id', function ($query) use ($persona_id) {
                return $query->select('id')->from('docentes')->where('persona_id', $persona_id);
            })
            ->orWhere('estudiante_responsable_id', function ($query) use ($persona_id) {
                return $query->select('id')->from('estudiantes')->where('persona_id', $persona_id);
            })
            ->orWhereIn('id', function ($query) use ($persona_id) {
                return $query->select('responsabilidad_social_id')->from('participante_rrss')
                    ->where('docente_id', function ($query) use ($persona_id) {
                        return $query->select('id')->from('docentes')->where('persona_id', $persona_id);
                    })
                    ->orWhere('estudiante_id', function ($query) use ($persona_id) {
                        return $query->select('id')->from('estudiantes')->where('persona_id', $persona_id);
                    });
            })
            ->orderBy('fecha_fin', 'desc')
            ->paginate(10);

        return view('livewire.rrss.listar-rrss-responsable', compact('rsu'));
    }
}
