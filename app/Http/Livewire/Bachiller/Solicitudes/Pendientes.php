<?php

namespace App\Http\Livewire\Bachiller\Solicitudes;

use App\Models\GradoEstudiante;
use App\Models\SolicitudBachiller;
use Livewire\Component;

class Pendientes extends Component
{
    protected $solicitudes;
    public $solicitudesCompletas, $solicitudesIncompletas;
    public $abrirCompleto = false;
    public $requisitosCompleto = false;
    public $solicitudSeleccionado = null;
    public $solicitante = null;

    public function render()
    {
        $this->obtenerPendientes();
        return view('livewire.bachiller.solicitudes.pendientes');
    }

    public function obtenerPendientes()
    {
        $this->solicitudes = SolicitudBachiller::query()
            ->withCount('documentos')
            ->with('estudiante')
            ->where('estado_id', 1)
            ->having('documentos_count', '>', 0)
            ->get();

        $this->solicitudesCompletas = $this->solicitudes->filter(function ($item) {
            return $item->documentos_count == 8;
        });
        $this->solicitudesIncompletas = $this->solicitudes->filter(function ($item) {
            return $item->documentos_count < 8;
        });
    }

    public function mostrarModal($id, $solicitante, $completo)
    {
        $this->solicitante = $solicitante;
        $this->requisitosCompleto = $completo;
        $this->solicitudSeleccionado = SolicitudBachiller::query()
            ->with('documentos')
            ->where('id', $id)
            ->first();
        $this->abrirCompleto = true;
    }

    public function aprobar()
    {
        $this->ejecutarSolicitud(3); // 3 Aprobado | Tb. EstadoSolicitud
        $this->abrirCompleto = false;
    }

    public function denegar()
    {
        $this->ejecutarSolicitud(2); // 2 Denegado | Tb. EstadoSolicitud
        $this->abrirCompleto = false;
    }

    private function ejecutarSolicitud($estado)
    {
        //Cambiar estado a aprobado
        $this->solicitudSeleccionado->estado_id = $estado;
        $this->solicitudSeleccionado->save();
        // Insertar estudiante al grado bachiller
        GradoEstudiante::create([
            'estudiante_id' => $this->solicitudSeleccionado->estudiante_id,
            'grado_academico_id' => 3
        ]);
    }
}
