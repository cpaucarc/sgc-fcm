<x-card class="bg-gray-700 border-gray-700 text-gray-300 shadow-md py-2">
    <div class="flex justify-between items-start gap-6">
        <div class="flex-1">
            <h2 class="font-bold text-sm lg:text-xl text-gray-400">
                {{ $indicador->cod_ind_inicial }}
            </h2>
            <h2 class="font-bold lg:text-2xl text-gray-200 max-w-2xl leading-2">
                {{ $indicador->objetivo }}
            </h2>
            <p class="flex items-center text-sm mt-4 text-gray-400">
                <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75"
                          d="M4.871 4A17.926 17.926 0 003 12c0 2.874.673 5.59 1.871 8m14.13 0a17.926 17.926 0 001.87-8c0-2.874-.673-5.59-1.87-8M9 9h1.246a1 1 0 01.961.725l1.586 5.55a1 1 0 00.961.725H15m1-7h-.08a2 2 0 00-1.519.698L9.6 15.302A2 2 0 018.08 16H8"/>
                </svg>
                <span class="font-bold">Fórmula:</span>
                <span class="italic mx-1 tracking-wide">
                    {{ $indicador->formula }}
                </span>
            </p>

        </div>
        <div class="text-gray-300 space-y-2 font-bold ml-3 flex-col items-end">
            <h3 class="px-4 py-2 bg-gray-800 rounded-lg text-center text-xs lg:text-sm">
                <span class="font-normal">Proceso de </span>
                {{ $indicador->proceso->nombre }}
            </h3>
            @if($indicador->escuela_id)
                <h3 class="px-4 py-2 bg-gray-800 rounded-lg text-center text-xs lg:text-sm">
                    <span class="font-normal">Programa de </span>
                    {{ $indicador->escuela->nombre }}
                </h3>
            @endif
        </div>
    </div>
</x-card>
