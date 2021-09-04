<x-card class="group hover:shadow-md hover:border-blue-600 hover:bg-blue-600 transition duration-500">

    <div class="flex items-center justify-between">
        <h3 class="font-bold tracking-wide text-gray-600 group-hover:text-white  transition duration-500">
            {{ $indicador->cod_ind_final }}
        </h3>
        <a href="{{ route('indicadores.indicador', [$indicador->id, $indicador->cod_ind_inicial]) }}"
           class="flex items-center bg-gray-200 group-hover:bg-blue-800 group-hover:shadow px-3 py-1 rounded text-sm text-gray-600 group-hover:text-blue-100 transition duration-500">
            Ver
            <svg class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M9 5l7 7-7 7"/>
            </svg>
        </a>
    </div>

    <p class="text-xs flex-1 text-gray-500 group-hover:text-blue-100 mt-4 transition duration-500">
        {{ $indicador->objetivo }}
    </p>

</x-card>
