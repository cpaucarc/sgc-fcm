<x-app-layout>

    <div class="grid grid-cols-3 gap-x-4 gap-y-6">
        @foreach( $procesos as $proceso )
            @if($proceso->indicadores_count)
                <x-card class="col-span-3 lg:col-span-1 group hover:shadow-lg transition duration-300">
                    <a class="text-lg font-bold text-gray-600 group-hover:text-gray-800"
                       href="{{ route('indicadores.indicadores', [$proceso->id, str_replace(' ', '_', $proceso->nombre)]) }}">
                        Proceso de {{ $proceso->nombre }}
                    </a>

                    <div class="flex items-center justify-between py-4">
                        <p class="text-gray-600 text-sm">
                            {{ $proceso->indicadores_count }} indicadores
                        </p>
                        <a href="{{ route('indicadores.indicadores', [$proceso->id, str_replace(' ', '_', $proceso->nombre)]) }}"
                           class="flex bg-gray-100 group-hover:bg-red-700 group-hover:shadow px-3 py-1 rounded text-sm text-gray-700 group-hover:text-white transition duration-300">
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
