<x-card>
    @slot('header')
        <div>
            <div class="flex items-center justify-between mb-2">
                <h1 class="text-xl font-bold text-gray-800">
                    Documentos recibidos
                </h1>
                <div>
                    <select name="ciclo" id="ciclo" wire:model="ciclo_seleccionado"
                            class="py-1 mt-1 rounded border border-gray-300 text-gray-600 focus:outline-none focus:border-blue-300 focus:ring-1 focus:ring-blue-300 focus:text-gray-800">
                        @foreach ($ciclos as $cl)
                            <option value="{{ $cl->id }}">
                                {{ $cl->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <p class="text-sm text-gray-400">
                En esta sección usted podrá encontrar los documentos que los responsables de cada actividad envió y en
                los cuales usted figura como cliente.
            </p>
        </div>
    @endslot


    <div class="mt-8 mb-4 overflow-hidden">
        <div class="mb-6">
            @if($salidas->count())
                <x-table>
                    <x-slot name="head">
                        <tr>
                            <th scope="col"
                                class="pl-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Salida
                            </th>
                            <th scope="col"
                                class="px-1 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Responsable
                            </th>
                            <th scope="col"
                                class="px-1 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Cantidad
                            </th>
                            <th scope="col"
                                class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Documento
                            </th>
                        </tr>
                    </x-slot>
                    <x-slot name="body">
                        @foreach ($salidas as $salida)
                            @if($salida->documentosCicloActual($ciclo_seleccionado)->count() > 0)
                                <tr class="text-gray-700">
                                    <td class="pl-4 py-3 text-sm whitespace-nowrap">
                                        <h1 class="tracking-wide font-semibold">
                                            {{ $salida->nombre }}
                                        </h1>
                                        <small class="text-gray-500 text-xs">
                                            {{ $salida->actividad->nombre }}
                                        </small>
                                    </td>
                                    <td class="px-1 py-3 whitespace-nowrap text-sm">
                                        {{ $salida->actividad->responsable->responsable->entidad->nombre }}
                                    </td>
                                    <td class="px-1 py-3 whitespace-nowrap text-sm">
                                        {{ $salida->documentosCicloActual($ciclo_seleccionado)->count() }}
                                        <span class="text-gray-500">
                                            documento(s)
                                        </span>
                                    </td>
                                    <td class="px-2 py-3 whitespace-nowrap text-sm font-medium">


                                        <button wire:click="abrirModal({{ $salida }})"
                                                class="flex items-center justify-center bg-transparent py-2 px-3 rounded text-gray-600 hover:bg-blue-50 hover:text-blue-700">
                                            Revisar
                                        </button>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </x-slot>
                </x-table>
            @else
                <h1 class="text-lg text-red-600 text-center">
                    Aun no hay ningún documento enviado por los responsables.
                </h1>
            @endif
        </div>
    </div>

    @if($sld)
        <x-jet-dialog-modal wire:model="abrir">
            <x-slot name="title">
                <h1 class="text-gray-700 font-bold text-sm lg:text-xl">
                    {{ $sld->nombre }}
                </h1>
            </x-slot>
            <x-slot name="content">


                @if($sld->documentosCicloActual($ciclo_seleccionado)->count())
                    <div class="flex justify-between items-center mb-2">
                        <h2 class="ml-2 mt-3 text-gray-500 text-lg">
                            Documentos recibidos para esta actividad:
                        </h2>
                        <span class="bg-gray-100 px-3 py-1 text-gray-700 rounded-full">
                            {{ $sld->documentosCicloActual($ciclo_seleccionado)->count() }}
                        </span>
                    </div>

                    <div class="ml-2 table w-full mb-6 text-gray-700">

                        @foreach($sld->documentosCicloActual($ciclo_seleccionado) as $sldcmt)
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
                                    <div class="table-cell text-right">

                                        <a href="{{ route('documentos', $sldcmt->documento->enlace_interno) }}"
                                           target="_blank"
                                           class="flex items-center justify-center bg-transparent py-2 px-3 rounded text-gray-600 hover:bg-blue-50 hover:text-blue-700">
                                            <svg class="h-5 w-5 hover:text-blue-800 mr-1" fill="none"
                                                 viewBox="0 0 24 24"
                                                 stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                      d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                            </svg>
                                            Ver
                                        </a>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

            </x-slot>
            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$set('abrir', false)">
                    Cerrar
                </x-jet-secondary-button>
            </x-slot>
        </x-jet-dialog-modal>
    @endif

</x-card>

