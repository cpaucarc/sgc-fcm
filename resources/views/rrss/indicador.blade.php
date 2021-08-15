<x-app-layout>

    <div class="space-y-4">

        {{-- Lista de indicadores --}}
        {{--        @livewire('rrss.indicador.lista', [ 'indicador' => $indicador->id ])--}}

        {{--    Cabecera: Datos generales del indicador--}}
        <x-card>
            <div class="flex justify-between items-start">
                <div class="flex-1">
                    <h1 class="text-gray-800 font-bold text-xl">
                        {{ $indicador->objetivo }}
                    </h1>
                    <h2 class="text-gray-500 font-bold">
                        <span class="text-gray-500 mr-1 font-normal">Proceso al que pertenece:</span>
                        {{ $indicador->proceso->nombre }}
                    </h2>
                    @if($indicador->escuela_id)
                        <h2 class="text-gray-500 font-bold">
                            <span class="text-gray-500 mr-1 font-normal">Programa de estudios:</span>
                            {{ $indicador->escuela->nombre }}
                        </h2>
                    @endif
                </div>
                <div class="text-gray-700 text-xs space-y-2 font-bold">
                    <h3 class="px-4 py-2 bg-gray-200">
                        <span class="text-gray-500 mr-1 font-normal rounded">CÓDIGO IND. INICIAL:</span>
                        {{ $indicador->cod_ind_inicial }}
                    </h3>
                    <h3 class="px-4 py-2 bg-gray-200">
                        <span class="text-gray-500 mr-1 font-normal rounded">CÓDIGO IND. FINAL:</span>
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
