<?php

namespace App\Http\Livewire\Convalidacion\Solicitudes;

use App\Models\Convalidacion;
use App\Models\SolicitudConvalidacion;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Livewire\Component;

class Pendientes extends Component
{
    protected $solicitudes;
    public $solicitudesCompletas, $solicitudesIncompletas;
    public $abrirCompleto = false;
    public $requisitosCompleto = false;
    public $solicitudSeleccionado = null;
    public $vacantes = null;
    public $solicitante = null;

    public function render()
    {
        $this->obtenerPendientes();
        return view('livewire.convalidacion.solicitudes.pendientes');
    }
    public function obtenerPendientes()
    {
        $this->solicitudes = SolicitudConvalidacion::query()
            ->withCount('documentos')
            ->with('estudiante')
            ->where('estado_id', 1)
            ->having('documentos_count', '>', 0)
            ->get();

        $this->solicitudesCompletas = $this->solicitudes->filter(function ($item) {
            return $item->documentos_count == 4;
        });
        $this->solicitudesIncompletas = $this->solicitudes->filter(function ($item) {
            return $item->documentos_count < 4;
        });
    }

    public function mostrarModal($id, $solicitante, $completo)
    {
        $this->solicitante = $solicitante;
        $this->requisitosCompleto = $completo;
        $this->solicitudSeleccionado = SolicitudConvalidacion::query()
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

        if ($estado == 3) {
            $this->vacante = (Convalidacion::query()
                ->where('fecha_fin', '>=',  Carbon::now())
                ->where('fecha_inicio', '<=',  Carbon::now())->first());
            $this->vacante->vacantes = $this->vacante->vacantes - 1;
            $this->vacante->save();
        }

        $this->emit('vacanteAprobado');
    }
}
