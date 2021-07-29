@if ($actividad)
    <div class="relative">
        {{-- Titulo y boton con el estado de la actividad --}}
        <div class="flex flex-col lg:flex-row justify-between items-start mb-6 px-4 lg:px-0">
            <div class="flex-1 mb-3">
                <h1 class="text-sm lg:text-2xl text-red-600 font-bold flex-1 truncate flex items-center">
                    {{ $actividad->nombre }}
                    <small class="ml-3 hidden lg:block px-2 text-sm bg-red-50 font-light text-red-700 rounded">
                        Etapa del Ciclo de Deming:
                        <strong class="font-bold">
                            {{ $actividad->tipoActividad->nombre }}
                        </strong>
                    </small>
                </h1>
                <h2 class="text-xs lg:text-sm text-gray-600">
                    Proceso: {{ $actividad->proceso->nombre }}
                </h2>
                <h3 class="text-xs lg:text-sm text-gray-500">
                    Correspondiente al ciclo académico {{ $ciclo->nombre }}
                </h3>
            </div>

            @if($estado == 0)
                <button wire:click="completarActividad"
                        class="text-xs lg:text-sm flex items-center bg-gray-200 px-3 py-1 text-gray-800 rounded-md hover:bg-gray-300 hover:text-gray-900">
                    {{ __('Completar') }}
                </button>
            @else
                <div class="flex flex-row lg:flex-col items-center">
                    <button wire:click="completarActividad"
                            class="text-xs lg:text-sm flex items-center bg-green-200 px-3 py-1 text-green-800 rounded-md hover:bg-green-300 hover:text-green-900">
                        <svg class="h-6 w-6 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        {{ __('Completado') }}
                    </button>
                    <small class="text-gray-500 ml-2 lg:ml-0 text-xs lg:text-sm">
                        @if($actividad->estadoActual)
                            Completado {{ $actividad->estadoActual->fecha_operacion->diffForHumans() }}
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
                                    <button wire:click="abrirModalDoc({{ $ep }})"
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

                    <div class="my-6">
                        <x-jet-label for="archivo">Archivo</x-jet-label>
                        <input type="file" wire:model="archivo" id="{{ $randomID }}"
                               class="input-form w-full">
                        @error('archivo')
                        <div class="text-red-500">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    @if($salida->documentos->count())
                        <div class="flex justify-between items-center">
                            <h2 class="ml-2 mt-3 text-gray-500 text-lg">
                                Documentos que has subido para esta actividad:
                            </h2>
                            <span class="bg-gray-100 px-3 py-1 text-gray-700 rounded-full">
                                {{ $salida->documentos->count() }}
                            </span>
                        </div>

                        <div class="ml-2 table w-full mb-6 text-gray-700">
                            @foreach($salida->documentos as $sldcmt)
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
                                        <div class="table-cell text-gray-500">
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
                                                <svg class="h-5 w-5 hover:text-red-800" fill="none"
                                                     viewBox="0 0 24 24"
                                                     stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          stroke-width="1.5" d="M6 18L18 6M6 6l12 12"/>
                                                </svg>
                                                <small>
                                                    Eliminar
                                                </small>
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
                    <h1 class="text-gray-700 font-bold text-sm lg:text-xl">
                        {{ $entrada_proveedor->entrada->nombre }}
                    </h1>
                    <h2 class="mb-3 text-gray-400">
                        Proveedor:
                        <strong>
                            {{ $entrada_proveedor->proveedor->entidad->nombre }}
                        </strong>
                    </h2>
                </x-slot>
                <x-slot name="content">

                    @if($entrada_proveedor->documentos->count())
                        <div class="flex justify-between items-center">
                            <h2 class="ml-2 my-3 text-gray-500 text-lg">
                                Documentos enviados por el proveedor:
                            </h2>
                            <span class="bg-gray-100 px-3 py-1 text-gray-700 rounded-full">
                                {{ $entrada_proveedor->documentos->count() }}
                            </span>
                        </div>

                        <div class="ml-2 table w-full mb-6 text-gray-700">
                            @foreach($entrada_proveedor->documentos as $entcmt)
                                <div class="table-row-group mb-1 space-y-2">
                                    <div class="table-row">
                                        <div class="table-cell align-middle">
                                            {{ $entcmt->documento->nombre }}
                                        </div>
                                        <div class="table-cell align-middle text-right">
                                            {{ $entcmt->fecha_operacion->diffForHumans() }}
                                        </div>
                                        <div class="table-cell text-gray-500">
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
