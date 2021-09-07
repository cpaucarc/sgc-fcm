@if ($actividad)
    <div class="relative">

        <x-slot name="header">
            <div class="flex flex-col lg:flex-row justify-between items-start px-6 lg:px-0">
                <h1 class="lg:text-2xl text-gray-800 font-bold flex-1 truncate">
                    {{ $actividad->nombre }}
                </h1>
            </div>
            <div class="flex gap-x-6 mt-0">
                <div class="mt-2 flex items-center text-sm text-gray-500">
                    <svg class="flex-shrink-0 mr-1 h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path d="M12 14l9-5-9-5-9 5 9 5z"/>
                        <path
                            d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"/>
                    </svg>
                    {{ $actividad->proceso->nombre }}
                </div>
                <div class="mt-2 items-center text-sm text-gray-500 hidden sm:flex">
                    <svg class="flex-shrink-0 mr-1 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                    </svg>
                    {{ $actividad->tipoActividad->nombre }}
                </div>
                <div class="mt-2 flex items-center text-sm font-bold text-indigo-600">
                    <x-icons.calendar :stroke="2" class="h-5 w-5 mr-1 text-indigo-500"/>
                    {{ $ciclo->nombre }}
                </div>
            </div>
        </x-slot>

        {{-- Titulo y boton con el estado de la actividad --}}
        <div class="absolute right-0 -top-24 lg:-top-28">
            @if($estado === false)
                <x-button-void wire:click="completarActividad">
                    {{ __('Completar') }}
                </x-button-void>
            @else
                <div class="flex flex-col items-end">
                    <x-button-soft color="green" wire:click="completarActividad">
                        <x-icons.check :stroke="2" class="h-5 w-5 mr-1"/>
                        {{ __('Completado') }}
                    </x-button-soft>

                    <small class="text-gray-500 ml-2 lg:ml-0 text-xs mt-1">
                        @if($actividad->estadoActual($ciclo->id)->count())
                            Completado {{ $actividad->estadoActual($ciclo->id)[0]->fecha_operacion->diffForHumans() }}
                        @endif
                    </small>
                </div>
            @endif
        </div>

        {{-- Alerta que se mostrara cuando se agrege correctamente un archivo en Salidas --}}
        <x-alert/>

        <div class="grid grid-cols-6 gap-6">
            <div class="col-span-6 lg:col-span-3">
                {{-- Entradas --}}
                <x-card>
                    <x-slot name="header">
                        <div class="flex justify-between items-center">
                            <div class="pr-4 flex-1">
                                <h1 class="text-xl font-bold text-gray-800">
                                    Entradas
                                </h1>
                                <p class="text-sm text-gray-400">
                                    Son documentos e información necesaria para completar la presente actividad
                                </p>
                            </div>
                            <span class="bg-gray-100 px-3 py-1 text-gray-700 rounded-full">
                                {{ $actividad->entradas->count() }}
                            </span>
                        </div>
                    </x-slot>

                    <div class="space-y-4">
                        @forelse( $actividad->entradas as $ep)
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
                                <button wire:click="abrirModalDoc({{ $ep }})"
                                        class="py-1 px-2 flex items-center rounded bg-transparent text-sm text-gray-400 hover:bg-yellow-100 hover:text-yellow-800">
                                    <x-icons.documents :stroke="1.5" class="h-5 w-5 mr-1"/>
                                    Documentos
                                </button>
                            </div>
                        @empty
                            <p>
                                No hay entradas
                            </p>
                        @endforelse
                    </div>
                </x-card>

            </div>
            <div class="col-span-6 lg:col-span-3">
                {{-- Salidas --}}
                <x-card>
                    <x-slot name="header">
                        <div class="flex justify-between items-center">
                            <div class="pr-4 flex-1">
                                <h1 class="text-xl font-bold text-gray-800">
                                    Salidas
                                </h1>
                                <p class="text-sm text-gray-400">
                                    Son documentos que usted enviará para completar la presente actividad
                                </p>
                            </div>
                            <span class="bg-gray-100 px-3 py-1 text-gray-700 rounded-full">
                                {{ $actividad->salidas->count() }}
                            </span>
                        </div>
                    </x-slot>
                    <div class="space-y-4">

                        @forelse( $actividad->salidas as $sld )
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
                        @empty
                            <p>
                                No hay salidas
                            </p>
                        @endforelse
                    </div>
                </x-card>
            </div>
        </div>

        @if($salida)
            <x-jet-dialog-modal wire:model="open">
                <x-slot name="title">
                    <h1 class="font-bold">
                        {{ $salida->nombre }}
                    </h1>
                    <button wire:click="$set('open', false)" class="text-gray-400 hover:text-gray-500">
                        <x-icons.x :stroke="1.5" class="h-5 w-5"/>
                    </button>
                </x-slot>

                <x-slot name="content">

                    <div class="my-6">
                        <x-jet-label for="archivo">Archivo</x-jet-label>
                        <input type="file" wire:model="archivo" id="{{ $randomID }}"
                               class="input-form w-full py-2">
                        @error('archivo')
                        <div class="text-red-500">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    @if($salida->documentosCicloActual($ciclo->id)->count())
                        <div class="flex justify-between items-center">
                            <h2 class="ml-2 mt-3 text-gray-500 text-lg">
                                Documentos que has subido para esta actividad:
                            </h2>
                            <span class="bg-gray-100 px-3 py-1 text-gray-700 rounded-full">
                                {{ $salida->documentosCicloActual($ciclo->id)->count() }}
                            </span>
                        </div>

                        <div class="ml-2 table w-full mb-6 text-gray-700">
                            @foreach($salida->documentosCicloActual($ciclo->id) as $sldcmt)
                                <div class="table-row-group mb-1 space-y-2">
                                    <div class="table-row">
                                        <div class="table-cell align-middle">
                                            <small>
                                                @if(strlen($sldcmt->documento->nombre) > 50)
                                                    {{ substr($sldcmt->documento->nombre, 0, 45) }}
                                                    ...{{ substr($sldcmt->documento->nombre, -15) }}
                                                @else
                                                    {{ $sldcmt->documento->nombre }}
                                                @endif
                                            </small>

                                        </div>
                                        <div class="table-cell align-middle text-right">
                                            <small>
                                                {{ $sldcmt->fecha_operacion->diffForHumans() }}
                                            </small>
                                        </div>
                                        <div class="table-cell text-gray-500 px-4">
                                            <a href="{{ route('documentos', $sldcmt->documento->enlace_interno) }}"
                                               target="_blank"
                                               class="hover:bg-green-100 hover:text-green-700 px-2 py-1 rounded flex justify-center items-center">
                                                <svg class="h-5 w-5 hover:text-green-800" fill="none"
                                                     viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          stroke-width="1.5"
                                                          d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                                </svg>
                                                <small>
                                                    Ver
                                                </small>
                                            </a>
                                        </div>
                                        <div class="table-cell text-gray-500">
                                            <button wire:click="eliminarArchivo({{ $sldcmt->documento }})"
                                                    class="hover:bg-red-100 hover:text-red-700 px-2 py-1 rounded flex justify-center items-center">
                                                <x-icons.x :stroke="1.5" class="h-5 w-5 hover:text-red-800"/>
                                                <small>Eliminar</small>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <h2 class="ml-2 my-3 text-gray-500 text-lg">
                        Esta información será visto por los siguientes clientes:
                    </h2>
                    <ul class="mt-1 flex flex-wrap gap-2">
                        @foreach($salida->clientes as $clt_sld)
                            <li class="bg-gray-200 rounded-full text-gray-900 font-medium px-4 py-1">
                                <small>
                                    {{ $clt_sld->cliente->entidad->nombre }}
                                </small>
                            </li>
                        @endforeach
                    </ul>


                </x-slot>
                <x-slot name="footer">

                    <x-jet-secondary-button wire:click="$set('open', false)">
                        Cerrar
                    </x-jet-secondary-button>

                    <x-jet-button
                        wire:click="enviarDocumentoSalida"
                        wire:target="enviarDocumentoSalida, archivo"
                        wire:loading.class="bg-gray-800"
                        wire:loading.attr="disabled">
                        <svg wire:loading wire:target="enviarDocumentoSalida"
                             class="animate-spin -ml-1 mr-3 h-4 w-4 text-white"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor"
                                  d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        <span>
                            {{ __('Guardar') }}
                        </span>
                    </x-jet-button>
                </x-slot>
            </x-jet-dialog-modal>
        @endif

        @if($entrada_proveedor)
            <x-jet-dialog-modal wire:model="openDoc">

                <x-slot name="title">
                    <div>
                        <h1 class="font-bold">
                            {{ $entrada_proveedor->entrada->nombre }}
                        </h1>
                        <p class="text-sm text-gray-500">
                            Proveedor:
                            <strong>
                                {{ $entrada_proveedor->proveedor->entidad->nombre }}
                            </strong>
                        </p>
                    </div>
                    <button wire:click="$set('openDoc', false)" class="text-gray-400 hover:text-gray-500">
                        <x-icons.x :stroke="1.5" class="h-5 w-5"/>
                    </button>
                </x-slot>

                <x-slot name="content">
                    @if($entrada_proveedor->documentosCicloActual($ciclo->id)->count())
                        <div class="flex justify-between items-center">
                            <h2 class="ml-2 my-3 text-gray-500 text-lg">
                                Documentos enviados por el proveedor:
                            </h2>
                            <span class="bg-gray-100 px-3 py-1 text-gray-700 rounded-full">
                                {{ $entrada_proveedor->documentosCicloActual($ciclo->id)->count() }}
                            </span>
                        </div>

                        <div class="ml-2 table w-full mb-6 text-gray-700">
                            @foreach($entrada_proveedor->documentosCicloActual($ciclo->id) as $entcmt)
                                <div class="table-row-group mb-1 space-y-2">
                                    <div class="table-row">
                                        <div class="table-cell align-middle">
                                            {{ $entcmt->documento->nombre }}
                                        </div>
                                        <div class="table-cell align-middle text-right">
                                            {{ $entcmt->fecha_operacion->diffForHumans() }}
                                        </div>
                                        <div class="table-cell text-gray-500 px-4">
                                            <a href="{{ route('documentos', $entcmt->documento->enlace_interno) }}"
                                               target="_blank"
                                               class="hover:bg-green-100 hover:text-green-700 px-2 py-1 rounded flex justify-center items-center">
                                                <svg class="h-5 w-5 hover:text-green-800" fill="none"
                                                     viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          stroke-width="1.5"
                                                          d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                                </svg>
                                                Ver
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <h2 class="text-lg text-red-500">
                            El proveedor aun no ha enviado ningun documento
                        </h2>
                    @endif

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
