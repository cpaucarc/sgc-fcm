<x-card class="group hover:shadow-md hover:bg-gray-50">

    <h3 class="font-bold tracking-wide text-gray-500 group-hover:text-gray-700">
        {{ $indicador->cod_ind_final }}
    </h3>

    <div class="flex items-center justify-between gap-4">
        <p class="text-xs flex-1 text-gray-500 group-hover:text-gray-600">
            {{ $indicador->objetivo }}
        </p>
        <a href="{{ route($route, $indicador->id) }}"
           class="bg-gray-100 group-hover:bg-blue-700 group-hover:shadow px-3 py-1 rounded text-sm text-gray-700 group-hover:text-white transition duration-300">
            Revisar
        </a>
    </div>

</x-card>
