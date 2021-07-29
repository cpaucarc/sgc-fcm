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
        {{--            {{ $salida_completo }}--}}

        <div class="mb-6">

            @if($salida_completo->count())
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
                                Enviado hace
                            </th>
                            <th scope="col"
                                class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Documento
                            </th>
                        </tr>
                    </x-slot>
                    <x-slot name="body">
                        @foreach ($salida_completo as $sldcmp)
                            <tr class="text-gray-700">
                                <td class="pl-4 py-3 text-sm whitespace-nowrap">
                                    <h1 class="tracking-wide font-semibold">
                                        {{ $sldcmp->salida->nombre }}
                                    </h1>
                                    <small class="text-gray-500 text-xs">
                                        {{ $sldcmp->salida->actividad->nombre }}
                                    </small>
                                </td>
                                <td class="px-1 py-3 whitespace-nowrap text-xs">
                                    {{ $sldcmp->salida->actividad->responsable->responsable->entidad->nombre }}
                                </td>
                                <td class="px-1 py-3 whitespace-nowrap text-sm">
                                    {{ $sldcmp->fecha_operacion->diffForHumans() }}
                                </td>
                                <td class="px-2 py-3 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('documentos', $sldcmp->documento->enlace_interno) }}"
                                       target="_blank"
                                       class="hover:underline hover:text-blue-700 pr-2 py-1 flex items-center">
                                        <svg class="h-5 w-5 hover:text-blue-800 mr-1" fill="none" viewBox="0 0 24 24"
                                             stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                  d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                        </svg>
                                        @if( strlen($sldcmp->documento->nombre) > 30 )
                                            {{ substr($sldcmp->documento->nombre, 0, 23) }}
                                            ...{{ substr($sldcmp->documento->nombre, -7) }}
                                        @else
                                            {{ $sldcmp->documento->nombre }}
                                        @endif
                                    </a>
                                </td>
                            </tr>
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

</x-card>

