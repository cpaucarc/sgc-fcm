<x-card>
    @slot('header')
        <div>
            <div class="flex items-center justify-between mb-2">
                <h1 class="text-xl font-bold text-gray-800">
                    Información a proveer
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
                En esta sección usted podrá ver la lista de documentos con las que debe proveer a los diferentes
                actividades.
            </p>
        </div>
    @endslot


    <div class="mt-8 mb-4 overflow-hidden">

        <div class="mb-6">
            <x-simple-progress percent="{{ $porcentaje }}">
                Actividades completadas:
                <span class="font-bold">{{ $completos }}</span> de
                <span class="font-bold">{{ $completos + $incompletos }}</span>
            </x-simple-progress>
        </div>

        @if ($porcentaje < 100)
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
                                <h1 class="text-gray-800">
                                    {{ substr($etpv->entrada, 0, 40) }}
                                </h1>
                                <small class="text-gray-400">
                                    {{ $etpv->actividad }}
                                </small>
                            </td>
                            <td class="px-1 py-2 whitespace-nowrap">
                                @if ($etpv->status === 1)
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
                    <h1 class="text-gray-700 font-bold text-sm lg:text-xl">
                        Entrada Proveedor
                    </h1>
                </x-slot>
                <x-slot name="content">
                    <h2 class="ml-2 mb-3 text-gray-500 text-lg">
                        Esta información se enviará a los siguientes clientes:
                    </h2>


                    <h2 class="ml-2 mt-3 text-gray-500 text-lg">
                        Esta información se enviará a los siguientes clientes:
                    </h2>
                    {{ $ent_prv_seleccionado }}

                </x-slot>
                <x-slot name="footer">
                    <x-jet-secondary-button wire:click="$set('abrir', false)">
                        Cerrar
                    </x-jet-secondary-button>
                </x-slot>
            </x-jet-dialog-modal>
        @endif


    </div>

</x-card>
