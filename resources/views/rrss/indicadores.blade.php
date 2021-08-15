<x-app-layout>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach($indicadores as $indicador)
            <div class="bg-white shadow-sm p-4 rounded-md flex items-center justify-between">

                <div class="flex justify-start items-center gap-x-4">
                    <a href="{{ route('rrss.indicador', $indicador->id) }}"
                       class="bg-yellow-200 hover:bg-yellow-300 w-12 h-12 rounded-full text-center">
                        <span class="inline-block align-middle font-bold text-sm text-yellow-800">
                        {{ $indicador->cod_ind_inicial }}
                            {{--                        {{ substr($indicador->cod_ind_inicial, 4, 3) }}--}}
                        </span>
                    </a>

                    @if($indicador->escuela_id)
                        {{ $indicador->escuela->nombre }}
                    @else
                        {{ $indicador->facultad->nombre }}
                    @endif
                </div>

                <a href="{{ route('rrss.indicador', $indicador->id) }}"
                   class="px-4 py-1 border border-gray-300 hover:bg-gray-100 rounded">
                    Ver
                </a>

            </div>
        @endforeach

    </div>

</x-app-layout>