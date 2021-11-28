<x-card>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div class="pr-4 flex-1">
                <h1 class="text-xl font-bold text-gray-800">
                    Información a proveer
                </h1>
                <p class="text-sm text-gray-400">
                    En esta sección usted podrá ver la lista de documentos con las que debe proveer a los diferentes
                    actividades.
                </p>
            </div>
            <label
                class="flex flex-col items-center whitespace-nowrap text-gray-700 font-bold w-48 flex-shrink-0 text-sm">
                Proceso
                <select wire:model="proceso_seleccionado" class="input-form w-full text-sm">
                    @foreach ($procesos as $prc)
                        <option value="{{ $prc->id }}">{{ $prc->nombre }}</option>
                    @endforeach
                </select>
            </label>
        </div>
    </x-slot>

    <div class="mb-4 overflow-hidden">

        <div class="mb-6">
            <x-simple-progress percent="{{ $porcentaje }}" color="gray">
                Entradas completadas:
                <span class="font-bold">{{ $completos }}</span> de
                <span class="font-bold">{{ $total }}</span>
            </x-simple-progress>
        </div>

        @if ($completos !== $total)
            <x-table>
                <x-slot name="head">
                    <x-table.heading>Entrada</x-table.heading>
                    <x-table.heading>Estado</x-table.heading>
                    <x-table.heading><span class="sr-only">Completar</span></x-table.heading>
                </x-slot>
                <x-slot name="body">
                    @foreach ($ent_prov as $etpv)
                        <x-table.row :odd="$loop->odd">
                            <x-table.cell>
                                <h1 class="tracking-wide font-bold">
                                    {{ $etpv->entrada->codigo }} - {{ $etpv->entrada->nombre }}
                                </h1>
                                <h2 class="text-gray-500">
                                    Actividad: {{ $etpv->actividad->nombre  }}
                                </h2>
                            </x-table.cell>
                            <x-table.cell>
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $etpv->cantidad ? 'bg-green-100 text-green-800':'bg-red-100 text-red-800' }}">
                                    {{ $etpv->cantidad ? 'Completado': 'No completado' }}
                                </span>
                            </x-table.cell>
                            <x-table.cell>
                                <x-button.invisible color="blue" wire:click="abrirModal({{ $etpv->id }})">
                                    <x-icons.open-modal class="w-5 h-5" stroke="1.5"></x-icons.open-modal>
                                </x-button.invisible>
                            </x-table.cell>
                        </x-table.row>
                    @endforeach
                </x-slot>
            </x-table>
        @else
            <div class="mt-6 w-full flex justify-center">
                <div class="w-6/12">
                    <img src="{{ asset('images/completed.svg') }}" alt="Actividades Completados" class="opacity-75">
                    <div class="w-full text-center text-gray-600 mt-4 text-xl leading-5">
                        Ya completó todas las actividades
                    </div>
                </div>
            </div>
        @endif

        @if($ent_prv_seleccionado)
            <x-jet-dialog-modal wire:model="abrir" maxWidth="3xl">

                <x-slot name="title">
                    <h1 class="font-bold">
                        {{ $ent_prv_seleccionado->entrada->nombre }}
                    </h1>
                    <button wire:click="$set('abrir', false)" class="text-gray-400 hover:text-gray-500">
                        <x-icons.x :stroke="1.5" class="h-5 w-5"></x-icons.x>
                    </button>
                </x-slot>

                <x-slot name="content">

                    <div class="space-y-4">

                        <div class="bg-gray-50 rounded p-3">
                            <h2 class="text-gray-700 font-semibold">
                                Escoger archivo:
                            </h2>
                            <input type="file" wire:model="archivo" id="{{ $randomID }}"
                                   class="input-form w-full py-2">
                            <x-loading-file wire:loading wire:target="archivo"></x-loading-file>

                            <x-jet-input-error for="archivo"></x-jet-input-error>
                        </div>

                        <div class="bg-blue-50 rounded p-3">
                            <div class="mb-3 flex justify-between items-center">
                                <h2 class="text-gray-700 font-semibold">
                                    Documentos que has subido:
                                </h2>
                                <span class="bg-blue-200 px-2 py-1 text-xs text-blue-900 rounded-full">
                                        {{ $ent_prv_seleccionado->documentos->count() }} documento(s)
                                    </span>
                            </div>
                            @if($ent_prv_seleccionado->documentos->count())
                                <div class="ml-2 table w-full mb-6 text-gray-700">
                                    @foreach($ent_prv_seleccionado->documentos as $entprv)
                                        <div class="table-row-group mb-1 space-y-2">
                                            <div class="table-row">
                                                <div class="table-cell align-middle">
                                                    <small>
                                                        @if(strlen($entprv->documento->nombre) > 60)
                                                            {{ substr($entprv->documento->nombre, 0, 45) }}
                                                            ...{{ substr($entprv->documento->nombre, -15) }}
                                                        @else
                                                            {{ $entprv->documento->nombre }}
                                                        @endif
                                                    </small>
                                                </div>
                                                <div class="table-cell align-middle text-right">
                                                    <small>
                                                        {{ $entprv->fecha_operacion->diffForHumans() }}
                                                    </small>
                                                </div>
                                                <div
                                                    class="table-cell text-gray-500 flex-1 text-right whitespace-nowrap">
                                                    <x-button.invisible-link color="blue" target="_blank"
                                                                             href="{{ route('documentos', $entprv->documento->enlace_interno) }}">
                                                        <x-icons.documents :stroke="1.5"
                                                                           class="h-5 w-5"></x-icons.documents>
                                                    </x-button.invisible-link>

                                                    <x-button.invisible color="red"
                                                                        wire:click="eliminarArchivo({{ $entprv->documento }})">
                                                        <x-icons.delete :stroke="1.5" class="h-5 w-5"></x-icons.delete>
                                                    </x-button.invisible>
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

                        <div class="bg-gray-50 rounded p-3">
                            <h2 class="mb-3 text-gray-700 font-semibold">
                                Este documento será utilizado para proveer a las siguientes actividades:
                            </h2>
                            <ul class="flex flex-wrap gap-2">
                                <li class="bg-gray-200 rounded-full text-gray-900 font-medium px-4 py-1 text-sm">
                                    {{ $ent_prv_seleccionado->actividad->nombre }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </x-slot>
                <x-slot name="footer">
                    <x-jet-secondary-button wire:click="$set('abrir', false)">
                        Cerrar
                    </x-jet-secondary-button>

                    <x-jet-button
                        wire:click="enviarDocumento"
                        wire:target="enviarDocumento, archivo"
                        wire:loading.class="bg-gray-800"
                        wire:loading.attr="disabled">
                        <x-icons.load class="h-4 w-4" wire:loading wire:target="enviarDocumento"></x-icons.load>
                        <span>
                            {{ __('Guardar') }}
                        </span>
                    </x-jet-button>
                </x-slot>
            </x-jet-dialog-modal>
        @endif
    </div>
</x-card>
