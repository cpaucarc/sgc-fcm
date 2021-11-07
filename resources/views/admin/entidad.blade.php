<x-app-layout>

    <div class="text-gray-800 mb-10">
        <h3 class="text-xl">
            Entidad
        </h3>
        <h2 class="font-bold text-3xl">
            {{ $entidad->nombre }}
        </h2>
    </div>

    <div class="grid grid-cols-3 gap-6 items-start">
        <x-card>
            <x-slot name="header">
                <h2 class="font-light text-gray-700">
                    Es responsable de las siguientes actividades:
                </h2>
            </x-slot>
            @livewire('admin.entidades.listar-responsables', ['id' => $entidad->id])
        </x-card>
        <x-card>
            <x-slot name="header">
                <h2 class="font-light text-gray-700">
                    Es proveedor de las siguientes entradas:
                </h2>
            </x-slot>
            @livewire('admin.entidades.listar-proveedores', ['id' => $entidad->id])
        </x-card>
        <x-card>
            <x-slot name="header">
                <h2 class="font-light text-gray-700">
                    Es cliente de las siguientes salidas:
                </h2>
            </x-slot>
            @livewire('admin.entidades.listar-clientes', ['id' => $entidad->id])
        </x-card>
    </div>


</x-app-layout>
