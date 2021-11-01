<?php

namespace App\Http\Livewire\Ttpp\Solicitud;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ListarRequisitos extends Component
{
    protected $listeners = [
        'requisitoGuardado' => 'render',
        'requisitoEliminado' => 'render',
    ];
    public function render()
    {
        $requisitos = DB::table('requisitos')
            ->select('id', 'nombre')
            ->where('proceso_id', 5) //! 5: Titulo profesional
            ->whereNotIn('id', function ($query) {
                $query->select('requisito_id')
                    ->from('documento_solicitud_titulo')
                    ->whereIn('solicitud_titulo_id', function ($query2) {
                        $query2->select('id')
                            ->from('solicitud_titulo')
                            ->whereIn('estudiante_id', function ($query3) {
                                $query3->select('id')
                                    ->from('estudiantes')
                                    ->where('persona_id', auth()->user()->persona_id);
                            });
                    });
            })
            ->get();
        return view('livewire.ttpp.solicitud.listar-requisitos')
        ->with(compact('requisitos'));
    }
}
