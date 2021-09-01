<x-app-layout>

    <div class="space-y-4">

        {{-- Lista de indicadores --}}
        {{--        @livewire('rrss.indicador.lista', [ 'indicador' => $indicador->id ])--}}

        {{--    Cabecera: Datos generales del indicador--}}
        <x-indicador.header :indicador="$indicador"/>

        {{--        <x-card>--}}
        {{--            @livewire('rrss.indicador.tabla-analisis', [ 'indicador' => $indicador->id ])--}}
        {{--        </x-card>--}}

        <x-card>
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

                @if( $indicador->cod_ind_inicial === 'IND-044' )
                    @livewire('investigacion.indicador.ind44', ['indicador' => $indicador->id])
                @elseif( $indicador->cod_ind_inicial === 'IND-045' )
                    @livewire('rrss.indicador.ind49', ['indicador' => $indicador->id])
                @elseif( $indicador->cod_ind_inicial === 'IND-046' )
                    @livewire('rrss.indicador.ind50', ['indicador' => $indicador->id])
                @elseif( $indicador->cod_ind_inicial === 'IND-047' )
                    @livewire('rrss.indicador.ind53', ['indicador' => $indicador->id])
                @endif

                {{-- FIN    Botones para crear nueva instancia de indicador --}}

            </div>

            {{--    Tabla historica--}}
            <x-table>
                <x-slot name="head">
                    <tr>
                        <x-table.heading class="text-center">
                            Periodo
                        </x-table.heading>

                        @if($indicador->titulo_interes)
                            <x-table.heading class="text-center">
                                {{ $indicador->titulo_interes }}
                            </x-table.heading>
                        @endif
                        @if($indicador->titulo_total)
                            <x-table.heading class="text-center">
                                {{ $indicador->titulo_total }}
                            </x-table.heading>
                        @endif
                        <x-table.heading class="text-center">
                            {{ $indicador->titulo_resultado }}
                        </x-table.heading>
                        <x-table.heading class="text-center">
                            Minimo
                        </x-table.heading>
                        <x-table.heading class="text-center">
                            Satisfactorio
                        </x-table.heading>
                        <x-table.heading class="text-center">
                            Sobresaliente
                        </x-table.heading>
                    </tr>
                </x-slot>

                <x-slot name="body">
                    @foreach($indicador->analisis as $i => $analisis)
                        <tr>
                            <x-table.cell class="text-center">
                                {{ $analisis->created_at->format('d-m-Y') }}
                            </x-table.cell>
                            @if($analisis->interes)
                                <x-table.cell class="text-center">
                                    {{ $analisis->interes }}
                                </x-table.cell>
                            @endif
                            @if($analisis->total)
                                <x-table.cell class="text-center">
                                    {{ $analisis->total }}
                                </x-table.cell>
                            @endif
                            <x-table.cell class="text-center">
                                {{ $analisis->resultado }}
                                @if($analisis->interes)
                                    {{ __('%') }}
                                @endif
                            </x-table.cell>
                            <x-table.cell class="text-center">
                                {{ $analisis->minimo }}
                                @if($analisis->interes)
                                    {{ __('%') }}
                                @endif
                            </x-table.cell>
                            <x-table.cell class="text-center">
                                {{ $analisis->satisfactorio }}
                                @if($analisis->interes)
                                    {{ __('%') }}
                                @endif
                            </x-table.cell>
                            <x-table.cell class="text-center">
                                {{ $analisis->sobresaliente }}
                                @if($analisis->interes)
                                    {{ __('%') }}
                                @endif
                            </x-table.cell>

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

        </x-card>


    </div>

</x-app-layout>
