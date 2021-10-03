<?php

namespace App\Http\Livewire\Bachiller\Solicitud;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ListaRequisitos extends Component
{
    protected $listeners = [
        'requisitoGuardado' => 'render',
        'requisitoEliminado' => 'render',
    ];

    public function render()
    {
        $requisitos = DB::table('requisitos')
            ->select('id', 'nombre')
            ->where('proceso_id', 12) // 12: Bachiller
            ->whereNotIn('id', function ($query) {
                $query->select('requisito_id')
                    ->from('documento_solicitud_bachiller')
                    ->whereIn('solicitud_bachiller_id', function ($query2) {
                        $query2->select('id')
                            ->from('solicitud_bachiller')
                            ->whereIn('estudiante_id', function ($query3) {
                                $query3->select('id')
                                    ->from('estudiantes')
                                    ->where('persona_id', auth()->user()->persona_id);
                            });
                    });
            })
            ->get();

        return view('livewire.bachiller.solicitud.lista-requisitos')
            ->with(compact('requisitos'));
    }
}
