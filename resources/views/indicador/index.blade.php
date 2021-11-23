<x-app-layout>

    <div class="p-6 bg-indigo-700 mb-8 flex items-center justify-between gap-x-4 rounded-lg">

        <h1 class="font-bold text-xl tracking-wide text-white">
            Indicadores agrupados por procesos
        </h1>

        @livewire('indicador.buscador')

    </div>


    <div class="grid grid-cols-3 gap-x-4 gap-y-6">
        @foreach ($procesos as $proceso)
            @if ($proceso->indicadores_count)
                <x-card
                    class="col-span-3 lg:col-span-1 group hover:shadow-lg hover:border-indigo-700">
                    <a class="text-lg font-bold text-gray-500 group-hover:text-indigo-700"
                       href="{{ route('indicadores.indicadores', [$proceso->id, str_replace(' ', '_', $proceso->nombre)]) }}">
                        Proceso de {{ $proceso->nombre }}
                    </a>

                    <div class="flex items-center justify-between pt-4">
                        <p class="text-gray-600 text-sm">
                            {{ $proceso->indicadores_count }} indicadores
                        </p>
                        <a href="{{ route('indicadores.indicadores', [$proceso->id, str_replace(' ', '_', $proceso->nombre)]) }}"
                           class="flex bg-gray-100 group-hover:bg-indigo-700 group-hover:shadow px-3 py-1 rounded text-sm text-gray-700 group-hover:text-white">
                            <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                      d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                            </svg>
                            Revisar
                        </a>
                    </div>

                </x-card>
            @endif
        @endforeach
    </div>

</x-app-layout>
