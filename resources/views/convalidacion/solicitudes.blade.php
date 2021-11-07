<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h1 class="font-bold text-xl text-gray-800">
                Solicitudes recibidos
            </h1>
            @livewire('convalidacion.vacantes-disponibles')
        </div>
    </x-slot>
    @livewire('convalidacion.solicitudes.pendientes')
</x-app-layout>
