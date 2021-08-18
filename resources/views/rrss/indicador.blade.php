<x-app-layout>

    <div class="space-y-4">

        {{-- Lista de indicadores --}}
        @livewire('rrss.indicador.lista', [ 'indicador' => $indicador->id ])

        {{--    Cabecera: Datos generales del indicador--}}
        <x-card class="bg-gray-700 text-gray-300">
            <div class="flex justify-between items-start">
                <div class="flex-1">
                    <h1 class="font-bold text-2xl">
                        {{ $indicador->objetivo }}
                    </h1>
                    <h2 class="text-gray-300 font-bold mt-2">
                        <span class="text-gray-400 mr-1 font-normal">Proceso al que pertenece:</span>
                        {{ $indicador->proceso->nombre }}
                    </h2>
                    @if($indicador->escuela_id)
                        <h2 class="text-gray-300 font-bold">
                            <span class="text-gray-400 mr-1 font-normal">Programa de estudios:</span>
                            {{ $indicador->escuela->nombre }}
                        </h2>
                    @endif
                </div>
                <div class="text-gray-700 text-sm space-y-2 font-bold ml-3">
                    <h3 class="px-4 py-2 bg-gray-400 rounded">
                        <span class="text-gray-700 mr-1 font-normal">CÓDIGO IND. INICIAL:</span>
                        {{ $indicador->cod_ind_inicial }}
                    </h3>
                    <h3 class="px-4 py-2 bg-gray-400 rounded">
                        <span class="text-gray-700 mr-1 font-normal">CÓDIGO IND. FINAL:</span>
                        {{ $indicador->cod_ind_final }}
                    </h3>
                </div>
            </div>
        </x-card>

        <x-card>
            @livewire('rrss.indicador.tabla-analisis', [ 'indicador' => $indicador->id ])
        </x-card>

    </div>

</x-app-layout>
