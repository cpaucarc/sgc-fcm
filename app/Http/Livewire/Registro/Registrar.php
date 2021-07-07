<?php

namespace App\Http\Livewire\Registro;

use App\Models\Entidad;
use App\Models\Escuela;
use App\Models\Facultad;
use App\Models\NivelEntidad;
use App\Models\Oficina;
use Livewire\Component;

class Registrar extends Component
{
    public $nivel = 0, $facultad = 0, $escuela = 0, $oficina = 0;

    public $facultades = null, $escuelas = null, $oficinas = null;

    public function updatedNivel()
    {
        $this->facultades = null;
        $this->escuelas = null;
        $this->oficinas = null;
        $this->oficina = 0;

        if ($this->nivel == 1) { //General
            $this->obtenerOficinasGeneral();
        } elseif ($this->nivel == 2) { //Facultad
            $this->obtenerFacultades();
            if ($this->facultad > 0) {
                $this->obtenerOficinasFacultad();
            } else {
                $this->oficinas = null;
            }
        } elseif ($this->nivel == 3) {//Escuelas
            $this->obtenerFacultades();
            if ($this->facultad > 0) {
                $this->obtenerEscuelas();
                if ($this->escuela > 0) {
                    $this->obtenerOficinasEscuela();
                }
            } else {
                $this->escuelas = null;
            }
        }
    }

    public function updatedFacultad()
    {
        $this->oficina = 0;

        if ($this->nivel == 2) {
            if ($this->facultad == 0) {
                $this->oficinas = null;
            } else {
                $this->obtenerOficinasFacultad();
            }
        } elseif ($this->nivel == 3) {
            if ($this->facultad == 0) {
                $this->escuelas = null;
                $this->oficinas = null;
            } else {
                $this->obtenerEscuelas();
            }
        }
    }

    public function updatedEscuela()
    {
        $this->oficina = 0;
        if ($this->escuela > 0) {
            $this->obtenerOficinasEscuela();
        } else {
            $this->oficinas = null;
        }
    }

    public function obtenerFacultades()
    {
        $this->facultades = Facultad::orderBy('nombre')->get();
    }

    public function obtenerEscuelas()
    {
        $this->escuelas = Escuela::orderBy('nombre')
            ->where('facultad_id', $this->facultad)
            ->get();
    }

    public function obtenerOficinasGeneral()
    {
        $this->oficinas = Oficina::select('oficinas.id', 'entidades.nombre')
            ->join('entidades', 'entidades.id', '=', 'oficinas.entidad_id')
            ->where('nivel_entidad_id', '=', 1)
            ->orderBy('entidades.nombre')
            ->get();
    }

    public function obtenerOficinasFacultad()
    {
        $this->oficinas = Oficina::select('oficinas.id', 'entidades.nombre')
            ->join('entidades', 'entidades.id', '=', 'oficinas.entidad_id')
            ->where('nivel_entidad_id', '=', 2)
            ->where('facultad_id', '=', $this->facultad)
            ->orderBy('entidades.nombre')
            ->get();
    }

    public function obtenerOficinasEscuela()
    {
        $this->oficinas = Oficina::select('oficinas.id', 'entidades.nombre')
            ->join('entidades', 'entidades.id', '=', 'oficinas.entidad_id')
            ->where('nivel_entidad_id', '=', 3)
            ->where('facultad_id', '=', $this->facultad)
            ->where('escuela_id', '=', $this->escuela)
            ->orderBy('entidades.nombre')
            ->get();
    }

    public function render()
    {
        $niveles = NivelEntidad::get();
        return view('livewire.registro.registrar')
            ->with(compact('niveles'));
    }
}
