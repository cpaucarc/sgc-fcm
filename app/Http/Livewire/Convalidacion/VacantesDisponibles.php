<?php

namespace App\Http\Livewire\Convalidacion;

use App\Models\Convalidacion;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Livewire\Component;

class VacantesDisponibles extends Component
{
    public $vacantes = null;
    public $fechaHoy = null;

    protected $listeners = [
        'vacanteAprobado' => 'render',
    ];
    public function vacantesDisponibles()
    {
        /*  $this->vacantes = DB::table('convalidaciones')
            ->select('vacantes')
            ->where('fecha_fin', '>=',  Carbon::now())
            ->where('fecha_inicio', '<=',  Carbon::now())
            ->get(); */

        $this->vacantes = DB::table('convalidaciones')
            ->select('vacantes', 'fecha_inicio', 'fecha_fin')
            ->whereIn('ciclo_id', function ($query) {
                $query->select('id')
                    ->from('ciclos')
                    ->where('fecha_fin', '>=',  Carbon::now())
                    ->where('fecha_inicio', '<=',  Carbon::now());
            })
            ->get();
        $this->fechaHoy = Carbon::now();
    }
    public function render()
    {
        $this->vacantesDisponibles();
        return view('livewire.convalidacion.vacantes-disponibles');
    }
}
