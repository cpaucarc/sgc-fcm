<x-card>

    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div class="pr-4 flex-1">
                <h1 class="text-xl font-bold text-gray-800">
                    Documentos recibidos
                </h1>
                <p class="text-sm text-gray-400">
                    En esta sección usted podrá encontrar los documentos que los responsables de cada actividad envió y
                    en los cuales usted figura como cliente.
                </p>
            </div>
            <select name="ciclo" id="ciclo" wire:model="ciclo_seleccionado"
                    class="py-1 mt-1 rounded border border-gray-300 text-gray-600 focus:outline-none focus:border-blue-300 focus:ring-1 focus:ring-blue-300 focus:text-gray-800">
                @foreach ($ciclos as $cl)
                    <option value="{{ $cl->id }}">
                        {{ $cl->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
    </x-slot>

    <div class="mt-8 mb-4 overflow-hidden">
        <div class="mb-6">
            @if($salidas->count())
                <x-table>
                    <x-slot name="head">
                        <x-table.heading>Salida</x-table.heading>
                        <x-table.heading>Responsable</x-table.heading>
                        <x-table.heading>Cantidad</x-table.heading>
                        <x-table.heading><span class="sr-only">Documentos</span></x-table.heading>
                    </x-slot>
                    <x-slot name="body">
                        @foreach ($salidas as $salida)
                            <x-table.row :odd="$loop->odd">
                                <x-table.cell>
                                    <h1 class="tracking-wide font-semibold">
                                        {{ $salida->nombre }}
                                    </h1>
                                    <small class="text-gray-500 text-xs">
                                        {{ $salida->actividad->nombre }}
                                    </small>
                                </x-table.cell>
                                <x-table.cell>
                                    {{ $salida->actividad->responsable->responsable->entidad->nombre }}
                                </x-table.cell>
                                <x-table.cell>
                                    {{ $salida->cantidad }}
                                    <span class="text-gray-500">
                                        documento(s)
                                    </span>
                                </x-table.cell>
                                <x-table.cell>
                                    <x-button.invisible color="blue" wire:click="abrirModal({{ $salida->id }})">
                                        <x-icons.open-modal class="w-5 h-5" stroke="1.5"></x-icons.open-modal>
                                    </x-button.invisible>
                                </x-table.cell>
                            </x-table.row>
                        @endforeach
                    </x-slot>
                </x-table>
            @else
                <x-message-image image="{{ asset('images/ilustraciones/sin_documentos.svg') }}"
                                 title="Aún no hay ningún documento enviado por los responsables."
                                 description="">
                </x-message-image>
            @endif
        </div>
    </div>

    @if($sld)
        <x-jet-dialog-modal wire:model="abrir" maxWidth="3xl">
            <x-slot name="title">
                <h1 class="font-bold">
                    {{ $sld->nombre }}
                </h1>
                <button wire:click="$set('abrir', false)" class="text-gray-400 hover:text-gray-500">
                    <x-icons.x :stroke="1.5" class="h-5 w-5"></x-icons.x>
                </button>
            </x-slot>

            <x-slot name="content">
                <div class="bg-gray-50 rounded p-4">
                    <div class="mb-3 flex justify-between items-center">
                        <h2 class="text-gray-700 font-semibold">
                            Documentos recibidos para esta actividad:
                        </h2>
                        <span class="bg-blue-200 px-2 py-1 text-xs text-blue-900 rounded-full">
                            {{ $sld->documentos->count() }} documento(s)
                        </span>
                    </div>
                    @if($sld->documentos->count())
                        <div class="ml-2 table w-full mb-6 text-gray-700">
                            @foreach($sld->documentos as $sldcmt)
                                <div class="table-row-group mb-1 space-y-2">
                                    <div class="table-row">
                                        <div class="table-cell align-middle">
                                            <a href="{{ route('documentos', $sldcmt->documento->enlace_interno) }}"
                                               target="_blank"
                                               class="hover:underline hover:text-blue-700 pr-2 py-1 flex items-center">
                                                @if(strlen($sldcmt->documento->nombre) > 50)
                                                    {{ substr($sldcmt->documento->nombre, 0, 37) }}
                                                    ...{{ substr($sldcmt->documento->nombre, -13) }}
                                                @else
                                                    {{ $sldcmt->documento->nombre }}
                                                @endif
                                            </a>
                                        </div>
                                        <div class="table-cell align-middle text-left">
                                            {{ $sldcmt->fecha_operacion->diffForHumans() }}
                                        </div>
                                        <div class="table-cell text-center">
                                            <x-button.invisible-link color="blue" target="_blank"
                                                                     href="{{ route('documentos', $sldcmt->documento->enlace_interno) }}">
                                                <x-icons.documents :stroke="1.5" class="h-5 w-5"></x-icons.documents>
                                            </x-button.invisible-link>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </x-slot>

        </x-jet-dialog-modal>
    @endif
</x-card>
