<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h1 class="text-gray-800 font-bold text-xl">
                Solicitud para obtener grado de bachiller
            </h1>
            @livewire('bachiller.solicitud.estado-solicitud')
        </div>
    </x-slot>


    <div class="grid grid-cols-6 gap-4 text-gray-800 flex items-start justify-between">

        <x-card class="col-span-4">
            <x-slot name="header">
                <div class="flex justify-between items-center">
                    <h1 class="font-bold text-lg text-gray-600">Requisitos enviados </h1>
                    @livewire('bachiller.solicitud.enviar-requisito')
                </div>
            </x-slot>
            @livewire('bachiller.solicitud.requisitos-enviados')
        </x-card>

        <div class="col-span-2 space-y-4">

            <x-card>
                <x-slot name="header">
                    <h1 class="font-bold text-lg text-gray-600">Requisitos faltantes</h1>
                </x-slot>

                @livewire('bachiller.solicitud.lista-requisitos')

            </x-card>
        </div>
    </div>

</x-app-layout>
