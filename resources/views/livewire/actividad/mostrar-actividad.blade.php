@if ($actividad)
    <div>
        {{-- Titulo y boton con el estado de la actividad --}}
        <div class="flex justify-between items-start mb-6">
            <div>
                <h1 class="text-2xl text-red-700 font-bold flex-1 truncate">
                    {{ $actividad->nombre }}
                    <span class="px-3 py-1 text-sm bg-red-100 font-light text-red-700 rounded-lg">
                        Etapa del Ciclo de Deming: {{ $actividad->tipoActividad->nombre }}
                    </span>
                </h1>
                <h2 class="text-gray-600">
                    Proceso: {{ $actividad->proceso->nombre }}
                </h2>
                <h3 class="text-gray-400">
                    Correspondiente al ciclo académico {{ $ciclo->nombre }}
                </h3>
            </div>

            @if($estado == 0)
                <button wire:click="completarActividad"
                        class="flex items-center bg-gray-200 px-3 py-1 text-gray-800 rounded-md hover:bg-gray-300 hover:text-gray-900">
                    {{ __('Completar') }}
                </button>
            @else
                <button wire:click="completarActividad"
                        class="flex items-center bg-green-200 px-3 py-1 text-green-800 rounded-md hover:bg-green-300 hover:text-green-900">
                    <svg class="h-6 w-6 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    {{ __('Completado') }}
                </button>
            @endif
        </div>

        <div class="grid grid-cols-6 gap-6">
            <div class="col-span-6 lg:col-span-3">
                {{-- Entradas --}}
                <x-card>
                    <div class="space-y-2">
                        <div class="flex items-center justify-between">
                            <h1 class="text-xl font-bold text-gray-600">Entradas</h1>
                            <span class="bg-gray-100 px-3 py-1 text-gray-700 rounded-full">
                            {{ $actividad->entradas->count() }}
                        </span>
                        </div>
                        @if($actividad->entradas->count())
                            @foreach( $actividad->entradas as $ep)
                                <div class="ml-2 py-2 flex items-start">
                                    <div
                                        class="w-10 h-10 rounded-full bg-yellow-100 flex justify-center items-center mr-2">
                                        <small class="text-yellow-800">
                                            {{ $ep->entrada->codigo }}
                                        </small>
                                    </div>
                                    <div class="truncate flex-1 mr-2">
                                        <h2 class="text-gray-800">
                                            {{ $ep->entrada->nombre }}
                                        </h2>
                                        <p class="text-gray-400 text-sm">
                                            <span class="text-gray-500">Proveedor: </span>
                                            {{ $ep->proveedor->entidad->nombre }}
                                        </p>
                                    </div>
                                    <button wire:click="abrirModalDoc({{ $ep->entrada }})"
                                            class="py-1 px-2 flex items-center rounded bg-transparent text-sm text-gray-400 hover:bg-yellow-100 hover:text-yellow-800">
                                        <svg class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                  d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2"/>
                                        </svg>
                                        Documentos
                                    </button>
                                </div>
                            @endforeach
                        @else
                            <p>
                                No hay entradas
                            </p>
                        @endif
                    </div>
                </x-card>

            </div>
            <div class="col-span-6 lg:col-span-3">
                {{-- Salidas --}}
                <x-card>
                    <div class="space-y-2">
                        <div class="flex items-center justify-between">
                            <h1 class="text-xl font-bold text-gray-600">Salidas</h1>
                            <span class="bg-gray-100 px-3 py-1 text-gray-700 rounded-full">
                                {{ $actividad->salidas->count() }}
                            </span>
                        </div>

                        @if($actividad->salidas->count())
                            @foreach( $actividad->salidas as $sld)
                                <div class="ml-2 py-2 flex items-center">
                                    <div
                                        class="w-10 h-10 rounded-full bg-blue-100 flex justify-center items-center mr-2">
                                        <small class="text-blue-800">
                                            {{ $sld->codigo }}
                                        </small>
                                    </div>

                                    <h2 class="flex-1 text-gray-800 truncate mr-2">
                                        {{ $sld->nombre }}
                                    </h2>

                                    <button wire:click="abrirModal({{ $sld }})"
                                            class="py-1 px-3 flex items-center rounded bg-transparent text-sm text-gray-400 hover:bg-blue-50 hover:text-blue-800">
                                        <svg class="h-5 w-5 mr-1" fill="currentColor" viewBox="0 0 16 16">
                                            <path stroke-width="1.5"
                                                  d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
                                        </svg>
                                        Clientes
                                    </button>
                                </div>
                            @endforeach
                        @else
                            <p>
                                No hay salidas
                            </p>
                        @endif
                    </div>
                </x-card>
            </div>
        </div>

        @if($salida)
            <x-jet-dialog-modal wire:model="open">
                <x-slot name="title">
                    <h1 class="text-gray-700 font-bold text-sm lg:text-xl">
                        {{ $salida->nombre }}
                    </h1>
                </x-slot>
                <x-slot name="content">
                    <h2 class="ml-2 mb-3 text-gray-500 text-lg">
                        Esta información se enviará a los siguientes clientes:
                    </h2>


                    <h2 class="ml-2 mt-3 text-gray-500 text-lg">
                        Esta información se enviará a los siguientes clientes:
                    </h2>
                    <ul class="mt-1 flex flex-wrap gap-2">
                        @foreach($salida->clientes as $clt_sld)
                            <li class="bg-blue-50 rounded-full text-blue-900 font-medium px-4 py-1">
                                {{ $clt_sld->cliente->entidad->nombre }}
                            </li>
                        @endforeach
                    </ul>

                </x-slot>
                <x-slot name="footer">
                    <x-jet-secondary-button wire:click="$set('open', false)">
                        Cerrar
                    </x-jet-secondary-button>
                </x-slot>
            </x-jet-dialog-modal>
        @endif

        @if($entrada)
            <x-jet-dialog-modal wire:model="openDoc">
                <x-slot name="title">
                    <h1 class="text-gray-700 font-bold text-sm lg:text-xl">
                        {{ $entrada->nombre }}
                    </h1>
                </x-slot>
                <x-slot name="content">
                    <h2 class="ml-2 mb-3 text-gray-500 text-lg">
                        Esta información se enviará a los siguientes clientes:
                    </h2>
                    {{ $entrada }}

                    <h2 class="ml-2 mt-3 text-gray-500 text-lg">
                        Esta información se enviará a los siguientes clientes:
                    </h2>
                    {{--                    <ul class="mt-1 flex flex-wrap gap-2">--}}
                    {{--                        @foreach($salida->clientes as $clt_sld)--}}
                    {{--                            <li class="bg-blue-50 rounded-full text-blue-900 font-medium px-4 py-1">--}}
                    {{--                                {{ $clt_sld->cliente->entidad->nombre }}--}}
                    {{--                            </li>--}}
                    {{--                        @endforeach--}}
                    {{--                    </ul>--}}

                </x-slot>
                <x-slot name="footer">
                    <x-jet-secondary-button wire:click="$set('openDoc', false)">
                        Cerrar
                    </x-jet-secondary-button>
                </x-slot>
            </x-jet-dialog-modal>
        @endif
    </div>
@endif
