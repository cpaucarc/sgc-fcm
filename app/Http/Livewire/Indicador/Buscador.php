<?php

namespace App\Http\Livewire\Indicador;

use App\Models\Indicador;
use Livewire\Component;

class Buscador extends Component
{
    public $query;
    public $indicadores;

    public function mount()
    {
        $this->resetear();
    }

    public function resetear()
    {
        $this->query = '';
        $this->indicadores = null;
    }

    public function updatedQuery()
    {
        $this->indicadores = Indicador::query()
            ->where('objetivo', 'like', '%' . $this->query . '%')
            ->orWhere('cod_ind_inicial', 'like', '%' . $this->query . '%')
            ->orderBy('cod_ind_inicial')
            ->with('escuela')
            ->limit(5)
            ->get();
    }

    public function render()
    {
        return view('livewire.indicador.buscador');
    }
}
