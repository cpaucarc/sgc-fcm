<x-card class="bg-gray-700 text-gray-300 shadow-md py-2">
    <div class="flex justify-between items-start gap-6">
        <div class="flex-1">
            <h2 class="font-bold text-sm lg:text-xl text-gray-400">
                {{ $indicador->cod_ind_inicial }}
            </h2>
            <h2 class="font-bold lg:text-2xl text-gray-200 max-w-2xl leading-2">
                {{ $indicador->objetivo }}
            </h2>
        </div>
        <div class="text-gray-300 space-y-2 font-bold ml-3 flex-col items-end">
            <h3 class="px-4 py-2 bg-gray-800 rounded-lg text-center text-xs lg:text-sm">
                <span class="font-normal">Proceso de </span>
                {{ $indicador->proceso->nombre }}
            </h3>
            @if($indicador->escuela_id)
                <h3 class="px-4 py-2 bg-gray-800 rounded-lg text-center text-xs lg:text-sm">
                    {{ $indicador->escuela->nombre }}
                </h3>
            @endif
        </div>
    </div>
</x-card>
