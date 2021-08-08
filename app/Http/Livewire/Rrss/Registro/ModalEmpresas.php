<?php

namespace App\Http\Livewire\Rrss\Registro;

use App\Models\Empresa;
use Livewire\Component;

class ModalEmpresas extends Component
{
    public $search;

    public function render()
    {
        $empresas = Empresa::where('nombre', 'like', "%" . $this->search . "%")
            ->orWhere('ruc', 'like', $this->search . "%")
            ->orWhere('direccion', 'like', "%" . $this->search . "%")
            ->orWhere('ubicacion', 'like', "%" . $this->search . "%")
            ->orderBy('nombre', 'asc')->limit(10)->get();
        return view('livewire.rrss.registro.modal-empresas', compact('empresas'));
    }
}
