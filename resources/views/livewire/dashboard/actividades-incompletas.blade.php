<x-card>
    @slot('header')
        <div>
            <div class="flex items-start justify-between">
                <h1 class="text-xl font-bold text-gray-800">
                    Mis actividades
                </h1>
                <div>
                    <label for="ciclo">Ciclo-{{ $ciclo_seleccionado }}-</label>

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
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aliquam asperiores, dolorem,
                impedit, iure iusto magnam maxime nisi non perferendis quam quisquam ratione similique
                veniam veritatis voluptates voluptatibus? Nostrum, qui!
            </p>
        </div>
    @endslot


    <div class="mt-8 mb-4 overflow-hidden">

        <div class="my-6">
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
                            Actividad
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
                    @foreach ($actividades as $actividad)
                        <tr>
                            <td class="pl-4 pr-2 py-2 text-sm whitespace-nowrap">
                                <h1 class="text-gray-800">
                                    {{ $actividad->actividad }}
                                </h1>
                                <small class="text-gray-400">
                                    {{ $actividad->entidad }} :
                                    <span class="italic">
                                        {{ $actividad->proceso }}
                                    </span>
                                </small>
                            </td>
                            <td class="px-1 py-2 whitespace-nowrap">
                                @if ($actividad->status === 1)
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
                                <a href="{{ route('actividad.mis-actividades', [$actividad->id, $ciclo_seleccionado]) }}"
                                   class="flex items-center justify-center bg-transparent py-2 px-3 rounded text-gray-600 hover:bg-blue-50 hover:text-blue-700">
                                    <svg class="h-5 w-5 mr-1 block lg:hidden" fill="none" viewBox="0 0 24 24"
                                         stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                              d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                    </svg>
                                    Revisar
                                </a>
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
    </div>

</x-card>
