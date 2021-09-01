<x-app-layout>

    <x-slot name="header">

        <div class="flex justify-between items-center">
            <h1 class="font-bold md:text-xl text-gray-800">
                Proyectos de Investigación
            </h1>
            <div class="flex justify-end gap-x-4">
                <a href="{{ route('investigacion.investigadores') }}"
                    class="px-4 py-2 bg-transparent text-sm text-gray-500 hover:text-gray-800 border border-gray-300 flex items-center rounded">
                    <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    Investigadores
                </a>
                <a href="{{ route('investigacion.indicadores') }}"
                    class="px-4 py-2 bg-transparent text-sm text-gray-500 hover:text-gray-800 border border-gray-300 flex items-center rounded">
                    <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
                    </svg>
                    Indicadores
                </a>
            </div>
        </div>

    </x-slot>


    @livewire('investigacion.listar-investigaciones')

</x-app-layout>
