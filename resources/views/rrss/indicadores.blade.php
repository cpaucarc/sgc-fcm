<x-app-layout>

    <div class="grid grid-cols-3 gap-6">
        @foreach($lista as $item)
            <div class="col-span-3 lg:col-span-1">
                <x-card>
                    <x-slot name="header">
                        <h2 class="font-bold text-gray-800">
                            Indicadores de {{ $item['nombre'] }}
                        </h2>
                    </x-slot>

                    <div class="grid grid-cols-2 gap-6">


                        @foreach($item['items'] as $it)
                            <div class="col-span-1 lg:col-span-2 flex justify-between">

                                <x-card>

                                    <h3 class="font-bold tracking-wide">
                                        {{ $it->cod_ind_final }}
                                    </h3>

                                    <div class="flex items-center justify-between">
                                        <p class="text-xs flex-1">
                                            {{ $it->objetivo }}
                                        </p>
                                        <a href="{{ route('rrss.indicador', $it->id) }}"
                                           class="bg-gray-100 hover:bg-blue-700 px-3 py-1 rounded text-sm text-gray-700 hover:text-white">
                                            Revisar
                                        </a>
                                    </div>

                                </x-card>


                            </div>
                        @endforeach
                    </div>
                </x-card>
            </div>
        @endforeach
    </div>

    {{--    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">--}}
    {{--        @foreach($indicadores as $indicador)--}}
    {{--            <div class="bg-white shadow-sm p-4 rounded-md flex items-center justify-between">--}}

    {{--                <div class="flex justify-start items-center gap-x-4">--}}
    {{--                    <a href="{{ route('rrss.indicador', $indicador->id) }}"--}}
    {{--                       class="bg-yellow-200 hover:bg-yellow-300 w-12 h-12 rounded-full text-center">--}}
    {{--                        <span class="inline-block align-middle font-bold text-sm text-yellow-800">--}}
    {{--                        {{ $indicador->cod_ind_inicial }}--}}
    {{--                            --}}{{--                        {{ substr($indicador->cod_ind_inicial, 4, 3) }}--}}
    {{--                        </span>--}}
    {{--                    </a>--}}

    {{--                    @if($indicador->escuela_id)--}}
    {{--                        {{ $indicador->escuela->nombre }}--}}
    {{--                    @else--}}
    {{--                        {{ $indicador->facultad->nombre }}--}}
    {{--                    @endif--}}
    {{--                </div>--}}

    {{--                <a href="{{ route('rrss.indicador', $indicador->id) }}"--}}
    {{--                   class="px-4 py-1 border border-gray-300 hover:bg-gray-100 rounded">--}}
    {{--                    Ver--}}
    {{--                </a>--}}

    {{--            </div>--}}
    {{--        @endforeach--}}

    {{--    </div>--}}

</x-app-layout>
