<div>
    {{--    Contador y creacion de nueva instancia--}}
    <div class="flex justify-between items-center mb-6">

        <div>
            <h3 class="ml-1 text-gray-600 font-bold text-lg">
                Hay
                <span class="text-gray-800">
                            {{ $indicador->analisis->count() }}
                        </span>
                instancias de este indicador
            </h3>
        </div>

        {{-- INICIO Botones para crear nueva instancia de indicador --}}

        @if( $indicador->cod_ind_inicial === 'IND-048' )
            @livewire('rrss.indicador.ind48', ['indicador' => $indicador->id])
        @elseif( $indicador->cod_ind_inicial === 'IND-049' )
            @livewire('rrss.indicador.ind49', ['indicador' => $indicador->id])
        @elseif( $indicador->cod_ind_inicial === 'IND-050' )
            @livewire('rrss.indicador.ind50', ['indicador' => $indicador->id])
        @elseif( $indicador->cod_ind_inicial === 'IND-051' )
            @livewire('rrss.indicador.ind51', ['indicador' => $indicador->id])
        @elseif( $indicador->cod_ind_inicial === 'IND-052' )
            @livewire('rrss.indicador.ind52', ['indicador' => $indicador->id])
        @else
            @livewire('rrss.indicador.ind53', ['indicador' => $indicador->id])
        @endif

        {{-- FIN    Botones para crear nueva instancia de indicador --}}

    </div>

    {{--    Tabla historica--}}

    <x-table>
        <x-slot name="head">
            <tr>
                <th scope="col"
                    class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Periodo
                </th>
                @if($indicador->titulo_interes)
                    <th scope="col"
                        class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{ $indicador->titulo_interes }}
                    </th>
                @endif
                @if($indicador->titulo_total)
                    <th scope="col"
                        class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{ $indicador->titulo_total }}
                    </th>
                @endif
                <th scope="col"
                    class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                    {{ $indicador->titulo_resultado }}
                </th>
                <th scope="col"
                    class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Minimo
                </th>
                <th scope="col"
                    class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Satisfactorio
                </th>
                <th scope="col"
                    class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Sobresaliente
                </th>
                {{--                <th scope="col" class="relative px-6 py-3">--}}
                {{--                    <span class="sr-only">Edit</span>--}}
                {{--                </th>--}}
            </tr>
        </x-slot>

        <x-slot name="body">
            @foreach($indicador->analisis as $i => $analisis)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                        {{ $analisis->created_at->format('d-m-Y') }}
                    </td>
                    @if($analisis->interes)
                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                            {{ $analisis->interes }}
                        </td>
                    @endif
                    @if($analisis->total)
                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                            {{ $analisis->total }}
                        </td>
                    @endif
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                        {{ $analisis->resultado }}
                        @if($analisis->interes)
                            {{ __('%') }}
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                        {{ $analisis->minimo }}
                        @if($analisis->interes)
                            {{ __('%') }}
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                        {{ $analisis->satisfactorio }}
                        @if($analisis->interes)
                            {{ __('%') }}
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                        {{ $analisis->sobresaliente }}
                        @if($analisis->interes)
                            {{ __('%') }}
                        @endif
                    </td>
                    {{--                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">--}}
                    {{--                        <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>--}}
                    {{--                    </td>--}}
                </tr>
            @endforeach
        </x-slot>
    </x-table>

    @if($indicador->analisis->count())
        <div class="py-4">
            @livewire('rrss.indicador.grafico', [ 'indicador' => $indicador->id ])
        </div>
    @endif

</div>
