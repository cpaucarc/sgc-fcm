<x-app-layout>

    <div class="flex justify-between mb-6">
        <h1 class="text-3xl text-blue-500 font-bold">
            {{ $actividad->nombre }}
        </h1>

        @if($actividad->estado == 0)
            <x-jet-secondary-button>
                Marcar como completado
            </x-jet-secondary-button>
        @else
            <x-jet-button>
                <svg class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M5 13l4 4L19 7"/>
                </svg>
                Completado
            </x-jet-button>
        @endif
    </div>

    <div class="grid grid-cols-5 gap-6">
        <div class="col-span-5 lg:col-span-2 space-y-4">
            <x-card>
                <div class="space-y-2">
                    <h1 class="text-xl font-bold text-gray-600">Entradas</h1>
                    @if($actividad->entradas->count())
                        @foreach( $actividad->entradas as $ep)
                            <div class="ml-2 py-2 flex items-start">
                                <div class="truncate flex-1 mr-2">
                                    <h2 class="text-gray-800">
                                        {{ $ep->entrada->codigo }} - {{ $ep->entrada->descripcion }}
                                    </h2>
                                    <p class="text-gray-500 text-sm">
                                        <span class="text-gray-400">Proveedor: </span>
                                        {{ $ep->proveedor->entidad->nombre }}
                                    </p>
                                </div>
                                <button
                                    class="py-1 px-2 flex items-center rounded bg-transparent text-sm text-gray-400 hover:bg-rose-50 hover:text-rose-700">
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
            <x-card>
                <div class="space-y-2">
                    <h1 class="text-xl font-bold text-gray-600">Salidas</h1>
                    @if($actividad->salidas->count())
                        @foreach( $actividad->salidas as $sld)
                            <div class="ml-2 py-2 flex items-center">
                                <h2 class="flex-1 text-gray-800 truncate mr-2">
                                    {{ $sld->salida->codigo }} - {{ $sld->salida->descripcion }}
                                </h2>
                                @livewire( 'actividad.mostrar-clientes',
                                ['salida' => $sld->salida], key($sld->salida->id)
                                )
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
        <div class="col-span-5 lg:col-span-3">
            <x-card>

                <div class="bg-white p-6">
                    <x-jet-label for="salida">
                        Proceso
                    </x-jet-label>
                    <select name="salida" id="salida"
                            class="mt-1 p-2 border-gray-300 focus:border-blue-300 focus:ring-3 focus:ring-blue-200 rounded shadow-sm w-full">
                        <option value="0">Selecciona p</option>
                    </select>
                    <br>
                    <br>
                    <select name="salida" id="salida"
                            class="input-form w-full">
                        <option value="0">Seleccione</option>
                    </select>
                    <br>
                    <br>
                    <input name="salida" id="salida" class="input-form w-full" value="Hola">
                    <br>
                    <br>
                    <input name="salida" id="salida" value="Hola q onda"
                           {{--                           class="mt-1 p-2 border border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 rounded shadow-sm w-full">--}}
                           class="p-2 mt-1 rounded border border-gray-300 text-gray-600 focus:outline-none focus:border-blue-300 focus:ring-1 focus:ring-blue-300 focus:text-gray-800">
                    <br>
                    <br>
                    <input name="salida" id="salida" value="Hola coom estas"
                           {{--                           class="mt-1 p-2 border border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 rounded shadow-sm w-full">--}}
                           class="border-gray-300 focus:border-blue-300 focus:ring-3 focus:ring-blue-200 shadow-sm rounded">
                    <br>
                    <br>
                    <x-jet-input></x-jet-input>
                    <br>
                    <br>
                    <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email"
                                 :value="old('email')" required/>
                </div>

                <div class="bg-rose-50 rounded-lg p-6">


                    {{ $actividad->salidas }}
                </div>
            </x-card>
        </div>
    </div>


</x-app-layout>
