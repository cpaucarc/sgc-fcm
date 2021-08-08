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

    {{-- Alerta que se mostrara cuando se agrege correctamente un archivo en Salidas --}}
    <x-alert/>

    <div class="mt-8 mb-4 overflow-hidden">

        <div class="mb-6">
            <x-simple-progress percent="{{ $porcentaje }}">
                Actividades completadas:
                <span class="font-bold">{{ $completos }}</span> de
                <span class="font-bold">{{ $total }}</span>
            </x-simple-progress>
        </div>

        @if ($completos !== $total)
            <x-table>
                <x-slot name="head">
                    <tr>
                        <th scope="col"
                            class="pl-4 pr-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Entrada
                        </th>
                        <th scope="col"
                            class="px-1 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Estado
                        </th>
                        <th scope="col" class="relative pr-4 pl-2 py-3">
                            <span class="sr-only">Completar</span>
                        </th>
                    </tr>
                </x-slot>
                <x-slot name="body">
                    @foreach ($ent_prov as $etpv)
                        <tr>
                            <td class="pl-4 pr-2 py-2 text-sm whitespace-nowrap">
                                <h1 class="tracking-wide font-semibold text-gray-800">
                                    {{ $etpv->entrada->codigo }} - {{ $etpv->entrada->nombre }}
                                </h1>
                                <small class="text-gray-500">
                                    Actividades: {{ $etpv->actividad->nombre  }}
                                </small>
                            </td>
                            <td class="px-1 py-2 whitespace-nowrap">
                                @if ($etpv->documentosCicloActual($ciclo_seleccionado)->count())
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        {{ __('Completado') }}
                                    </span>
                                @else
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                        {{ __('Sin completar') }}
                                    </span>
                                @endif
                            </td>
                            <td class="pr-4 pl-2 py-2 whitespace-nowrap text-right text-sm font-medium">
                                <button wire:click="abrirModal({{ $etpv }})"
                                        class="py-2 px-3 flex items-center rounded bg-transparent text-sm text-gray-400 hover:bg-blue-50 hover:text-blue-800">
                                    Abrir
                                </button>
                            </td>
                        </tr>
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
            <x-jet-dialog-modal wire:model="abrir">

                <x-slot name="title">
                    <h1 class="font-bold">
                        {{ $ent_prv_seleccionado->entrada->nombre }}
                    </h1>
                    <button wire:click="$set('abrir', false)" class="text-gray-400 hover:text-gray-500">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                  d="M6 18L18 6M6 6l12 12"/>
                        </svg>
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

                    @if($ent_prv_seleccionado->documentosCicloActual($ciclo_seleccionado)->count())
                        <div class="flex justify-between items-center">
                            <h2 class="mt-3 text-gray-500 text-lg">
                                Documentos que has subido:
                            </h2>
                            <span class="bg-gray-100 px-3 py-1 text-gray-700 rounded-full">
                                {{ $ent_prv_seleccionado->documentosCicloActual($ciclo_seleccionado)->count() }}
                            </span>
                        </div>

                        <div class="ml-2 table w-full mb-6 text-gray-700">
                            @foreach($ent_prv_seleccionado->documentosCicloActual($ciclo_seleccionado) as $entprv)
                                <div class="table-row-group mb-1 space-y-2">
                                    <div class="table-row">
                                        <div class="table-cell align-middle">
                                            <small>
                                                @if(strlen($entprv->documento->nombre) > 50)
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
                                        <div class="table-cell px-4">
                                            <a href="{{ route('documentos', $entprv->documento->enlace_interno) }}"
                                               target="_blank"
                                               class="text-xs hover:bg-green-100 hover:text-green-700 px-2 py-1 rounded flex flex-row justify-center items-center">
                                                <svg class="h-5 w-5 hover:text-green-800" fill="none"
                                                     viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          stroke-width="1.5"
                                                          d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                                </svg>
                                                {{ __('Ver') }}
                                            </a>
                                        </div>
                                        <div class="table-cell text-gray-500">
                                            <button wire:click="eliminarArchivo({{ $entprv->documento }})"
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

                    <h2 class="mt-3 text-gray-500 text-lg">
                        Este documento será utilizado para proveer a las siguientes actividades:
                    </h2>
                    <ul class="mt-1 flex flex-wrap gap-2">
                        <li class="bg-gray-200 rounded-full text-gray-900 font-medium px-4 py-1">
                            <small>
                                {{ $ent_prv_seleccionado->actividad->nombre }}
                            </small>
                        </li>
                    </ul>

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
                        <svg wire:loading wire:target="enviarDocumento"
                             class="animate-spin -ml-1 mr-3 h-4 w-4 text-white"
                             fill="none" viewBox="0 0 24 24">
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


    </div>

</x-card>
