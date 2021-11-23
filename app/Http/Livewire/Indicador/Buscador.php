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
            ->where('objetivo', 'like', '%' . str_replace(" ", "%", $this->query) . '%')
            ->orWhere('cod_ind_inicial', 'like', '%' . str_replace(" ", "%", $this->query) . '%')
            ->orderBy('cod_ind_inicial')
            ->with('escuela', 'proceso')
            ->limit(5)
            ->get();
    }

    public function render()
    {
        return view('livewire.indicador.buscador');
    }
}
