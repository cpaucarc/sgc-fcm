<?php

namespace App\Http\Livewire\Rrss\Empresas;

use App\Models\Empresa;
use Livewire\Component;
use Livewire\WithPagination;

class ListarEmpresas extends Component
{
    use WithPagination;

    public $empresa_seleccionada = null;
    public $abrir = false;
    public $cantidad = 10;
    public $search = '';
    public $sort = 'id';
    public $direction = 'desc';

    protected $listeners = ['renderizar' => 'render'];

    protected $rules = [
        'empresa_seleccionada.nombre' => 'required', //whatever rules you want
        'empresa_seleccionada.ruc' => 'required',
        'empresa_seleccionada.telefono' => 'nullable|max:9|min:9',
        'empresa_seleccionada.correo' => 'nullable|email',
        'empresa_seleccionada.direccion' => 'nullable|max:200',
        'empresa_seleccionada.ubicacion' => 'nullable|max:200',
    ];

    public function mount()
    {
        $this->empresa_seleccionada = new Empresa();
    }

    public function abrirModal(Empresa $empresa)
    {
        $this->empresa_seleccionada = $empresa;
        $this->abrir = true;
    }

    public function actualizarEmpresa()
    {
        $this->validate();
        $this->empresa_seleccionada->save();
        $this->emit('guardado', "Se actualizó los datos de la empresa " . $this->empresa_seleccionada->nombre);
        $this->reset(['empresa_seleccionada', 'abrir']);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingCantidad()
    {
        $this->resetPage();
    }

    public function sortBy($sort)
    {
        if ($this->sort === $sort) {
            $this->direction = $this->direction === 'desc' ? 'asc' : 'desc';
        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }
    }

    public function render()
    {
        $empresas = Empresa::query()
            ->withCount('rrss')
            ->where('nombre', 'like', '%' . $this->search . '%')
            ->orWhere('ruc', 'like', '%' . $this->search . '%')
            ->orWhere('correo', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->cantidad);

        return view('livewire.rrss.empresas.listar-empresas')
            ->with(compact('empresas'));
    }
}
