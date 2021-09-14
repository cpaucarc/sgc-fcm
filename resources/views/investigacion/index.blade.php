<x-app-layout>

    <x-slot name="header">

        <div class="flex justify-between items-center">
            <h1 class="font-bold md:text-xl text-gray-800">
                Proyectos de Investigación
            </h1>
            <div class="flex justify-end gap-x-4">
                <a href="{{ route('investigacion.investigadores') }}"
                   class="px-4 py-2 bg-transparent text-sm text-gray-500 hover:text-gray-800 border border-gray-300 flex items-center rounded">
                    <x-icons.people :stroke="1.5" class="h-5 w-5 mr-2"></x-icons.people>
                    Investigadores
                </a>
                <a href="{{ route('investigacion.indicadores') }}"
                   class="px-4 py-2 bg-transparent text-sm text-gray-500 hover:text-gray-800 border border-gray-300 flex items-center rounded">
                    <x-icons.presentation-chart :stroke="1.5" class="h-5 w-5 mr-2"></x-icons.presentation-chart>
                    Indicadores
                </a>
            </div>
        </div>

    </x-slot>


    @livewire('investigacion.listar-investigaciones')

</x-app-layout>
