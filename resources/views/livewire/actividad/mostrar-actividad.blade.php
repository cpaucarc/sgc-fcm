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
                    <x-icons.calendar :stroke="2" class="h-5 w-5 mr-1 text-indigo-500"></x-icons.calendar>
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
                        <x-icons.check :stroke="2" class="h-5 w-5 mr-1"></x-icons.check>
                        {{ __('Completado') }}
                    </x-button-soft>

                    @if($actividad->estado)
                        <small class="text-gray-500 ml-2 lg:ml-0 text-xs mt-1">
                            Completado el {{ $actividad->estado }}
                        </small>
                    @endif
                </div>
            @endif
        </div>

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
                                {{ $actividad->entradas_count }}
                            </span>
                        </div>
                    </x-slot>

                    <div class="space-y-4">
                        @forelse( $actividad->entradas as $ep)
                            <div class="ml-2 py-2 flex items-start">
                                <div
                                    class="w-10 h-10 rounded-full bg-yellow-100 flex justify-center items-center mr-2">
                                    <small class="text-yellow-800 font-semibold">
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
                                <x-button.invisible color="yellow" wire:click="abrirModalDoc({{ $ep->id }})">
                                    <x-icons.open-modal class="h-6 w-6 mr-1" stroke="1.25"></x-icons.open-modal>
                                    Documentos
                                </x-button.invisible>
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
                                {{ $actividad->salidas_count }}
                            </span>
                        </div>
                    </x-slot>
                    <div class="space-y-4">

                        @forelse( $actividad->salidas as $sld )
                            <div class="ml-2 py-2 flex items-center">
                                <div
                                    class="w-10 h-10 rounded-full bg-blue-100 flex justify-center items-center mr-2">
                                    <small class="text-blue-800 font-semibold">
                                        {{ $sld->codigo }}
                                    </small>
                                </div>

                                <h2 class="flex-1 text-gray-800 truncate mr-2">
                                    {{ $sld->nombre }}
                                </h2>

                                <x-button.invisible color="blue" wire:click="abrirModal({{ $sld->id }})">
                                    <x-icons.open-modal class="h-6 w-6 mr-1" stroke="1.25"></x-icons.open-modal>
                                    Clientes
                                </x-button.invisible>
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
                        <x-icons.x :stroke="1.5" class="h-5 w-5"></x-icons.x>
                    </button>
                </x-slot>

                <x-slot name="content">

                    <div class="space-y-6">
                        <div class="bg-gray-50 rounded p-4">
                            <h2 class="mb-3 text-gray-600 font-semibold">
                                Subir archivo:
                            </h2>
                            <input type="file" wire:model="archivo" class="input-form w-full py-2">
                            <x-loading-file wire:loading wire:target="archivo"></x-loading-file>

                            <x-jet-input-error for="archivo"></x-jet-input-error>
                        </div>

                        <div class="bg-gray-50 rounded p-4">
                            @if($salida->documentos->count())
                                <div class="mb-3 flex justify-between items-center">
                                    <h2 class="text-gray-600 font-semibold">
                                        Documentos que has subido para esta actividad:
                                    </h2>
                                    <span class="bg-blue-200 px-3 py-1 text-blue-900 rounded-full text-xs">
                                        {{ $salida->documentos->count() }} documento(s)
                                    </span>
                                </div>

                                <div class="table w-full text-gray-700">
                                    @foreach($salida->documentos as $sldcmt)
                                        <div class="table-row-group py-2 space-y-2">
                                            <div class="table-row">
                                                <div class="table-cell align-middle">
                                                    <small>
                                                        @if(strlen($sldcmt->documento->nombre) > 60)
                                                            {{ substr($sldcmt->documento->nombre, 0, 45) }}
                                                            ...{{ substr($sldcmt->documento->nombre, -15) }}
                                                        @else
                                                            {{ $sldcmt->documento->nombre }}
                                                        @endif
                                                    </small>

                                                </div>
                                                <div class="table-cell align-middle text-right whitespace-nowrap">
                                                    <small>
                                                        {{ $sldcmt->fecha_operacion->diffForHumans() }}
                                                    </small>
                                                </div>
                                                <div class="table-cell text-gray-500 px-4 text-right">
                                                    <div class="gap-2 whitespace-nowrap">
                                                        <x-button.invisible-link color="green" target="_blank"
                                                                                 href="{{ route('documentos', $sldcmt->documento->enlace_interno) }}">
                                                            <x-icons.documents class="h-5 w-5"
                                                                               stroke="1.5"></x-icons.documents>
                                                            Ver
                                                        </x-button.invisible-link>
                                                        <x-button.invisible color="red"
                                                                            wire:click="eliminarArchivo({{ $sldcmt->documento }})">
                                                            <x-icons.delete :stroke="1.5"
                                                                            class="h-5 w-5 hover:text-red-800"></x-icons.delete>
                                                        </x-button.invisible>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="grid place-items-center">
                                    <div class="flex items-center">
                                        <img src="{{ asset('images/ilustraciones/sin_documentos.svg') }}" class="w-24"
                                             alt="Grafico">
                                        <p class="font-bold text-gray-600">
                                            Aún no has enviado ningun documento
                                        </p>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="bg-gray-50 rounded p-4">
                            <h2 class="mb-3 text-gray-600 font-semibold">
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
                        </div>
                    </div>

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
                        <x-icons.load class="h-4 w-4" wire:loading wire:target="enviarDocumentoSalida"></x-icons.load>
                        <span>
                            {{ __('Guardar') }}
                        </span>
                    </x-jet-button>
                </x-slot>
            </x-jet-dialog-modal>
        @endif

        @if($entrada_proveedor)
            <x-jet-dialog-modal wire:model="openDoc" maxWidth="3xl">

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
                        <x-icons.x :stroke="1.5" class="h-5 w-5"></x-icons.x>
                    </button>
                </x-slot>

                <x-slot name="content">

                    <div class="bg-gray-50 rounded p-4">
                        @if($entrada_proveedor->documentos->count())
                            <div class="flex justify-between items-center mb-4">
                                <h2 class="text-gray-600 font-semibold">
                                    Documentos enviados por el proveedor:
                                </h2>
                                <span class="bg-blue-200 px-3 py-1 text-blue-900 rounded-full text-xs">
                                    {{ $entrada_proveedor->documentos->count() }} documento(s)
                                </span>
                            </div>

                            <div class="ml-2 table w-full mb-6 text-gray-700">
                                @foreach($entrada_proveedor->documentos as $entcmt)
                                    <div class="table-row-group py-2 space-y-2">
                                        <div class="table-row">
                                            <div class="table-cell align-middle text-sm flex-1">
                                                @if(strlen($entcmt->documento->nombre) < 60)
                                                    {{ $entcmt->documento->nombre }}
                                                @else
                                                    {{ substr($entcmt->documento->nombre, 0, 45) .'...'. substr($entcmt->documento->nombre, -15) }}
                                                @endif
                                            </div>
                                            <div
                                                class="table-cell align-middle text-right whitespace-nowrap text-sm text-gray-600">
                                                {{ $entcmt->fecha_operacion->diffForHumans() }}
                                            </div>
                                            <div class="table-cell text-gray-500 text-right px-4 flex-shrink-0 w-min">
                                                <x-button.invisible-link color="green" target="_blank"
                                                                         href="{{ route('documentos', $entcmt->documento->enlace_interno) }}">
                                                    <x-icons.documents class="h-5 w-5 mr-1"
                                                                       stroke="1.5"></x-icons.documents>
                                                    Ver
                                                </x-button.invisible-link>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <x-message-image image="{{ asset('images/ilustraciones/sin_documentos.svg') }}"
                                             title="El proveedor aun no ha enviado ningun documento."
                                             description="">
                            </x-message-image>
                        @endif
                    </div>
                </x-slot>

            </x-jet-dialog-modal>
        @endif

        @push('js')
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                Livewire.on('guardado', msg => {
                    Swal.fire({
                        icon: 'success',
                        title: '',
                        text: msg,
                    });
                });
                Livewire.on('error', msg => {
                    Swal.fire({
                        icon: 'error',
                        title: '',
                        text: msg,
                    });
                });
            </script>
        @endpush

    </div>
@endif
