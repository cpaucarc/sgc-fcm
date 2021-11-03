<?php

namespace App\Http\Livewire\Convalidacion;

use App\Models\Convalidacion;
use App\Models\Escuela;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Livewire\Component;

class VacantesDisponibles extends Component
{
    public $vacantes = null;
    public $fechaHoy = null;
    public $escuela_id;

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
        $this->escuela_id = (Auth::user()->roles)[0]->oficina->escuela_id;

        if ($this->escuela_id != null) {
            $this->vacantes = DB::table('convalidaciones')
                ->select('vacantes', 'fecha_inicio', 'fecha_fin', 'ciclo_id', 'escuela_id')
                ->whereIn('ciclo_id', function ($query) {
                    $query->select('id')
                        ->from('ciclos')
                        ->where('fecha_fin', '>=',  Carbon::now())
                        ->where('fecha_inicio', '<=',  Carbon::now());
                })
                ->where('escuela_id', $this->escuela_id)
                ->get();
        }
        $this->fechaHoy = Carbon::now();
    }
    public function render()
    {
        $this->vacantesDisponibles();
        return view('livewire.convalidacion.vacantes-disponibles');
    }
}
