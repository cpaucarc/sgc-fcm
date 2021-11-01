<?php

namespace App\Http\Livewire\Convalidacion\Solicitud;

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
            ->where('proceso_id', 16) // 16: Convalidación
            ->whereNotIn('id', function ($query) {
                $query->select('requisito_id')
                    ->from('documento_convalidacion')
                    ->whereIn('solicitud_convalidacion_id', function ($query2) {
                        $query2->select('id')
                            ->from('solicitud_convalidacion')
                            ->whereIn('estudiante_id', function ($query3) {
                                $query3->select('id')
                                    ->from('estudiantes')
                                    ->where('persona_id', auth()->user()->persona_id);
                            });
                    });
            })
            ->get();
        return view('livewire.convalidacion.solicitud.lista-requisitos')->with(compact('requisitos'));
    }
}
