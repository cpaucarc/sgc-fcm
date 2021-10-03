<?php

namespace App\Http\Livewire\Bachiller\Solicitud;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class EstadoSolicitud extends Component
{

    public $estado = null;

    protected $listeners = [
        'solicitudCreado' => 'render',
    ];

    public function obtenerEstado()
    {
        $this->estado = DB::table('solicitud_bachiller')
            ->select('solicitud_bachiller.id', 'solicitud_bachiller.created_at', 'estado_solicitud.nombre', 'estado_solicitud.color')
            ->join('estado_solicitud', 'estado_solicitud.id', '=', 'solicitud_bachiller.estado_id')
            ->whereIn('estudiante_id', function ($query) {
                $query->select('id')
                    ->from('estudiantes')
                    ->where('persona_id', auth()->user()->persona_id);
            })
            ->limit(1)
            ->get();
    }

    public function render()
    {
        $this->obtenerEstado();
        return view('livewire.bachiller.solicitud.estado-solicitud');
    }
}
