<x-card>

    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div class="pr-4 flex-1">
                <h1 class="text-xl font-bold text-gray-800">
                    Mis actividades
                </h1>
                <p class="text-sm text-gray-400">
                    En esta sección usted podrá ver la lista de actividades que le corresponde realizar durante el
                    semestre.
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
            <x-simple-progress percent="{{ $porcentaje }}">
                Actividades completadas:
                <span class="font-bold">{{ $completos }}</span> de
                <span class="font-bold">{{ $total }}</span>
            </x-simple-progress>
        </div>

        @if ($completos !== $total)
            <x-table>
                <x-slot name="head">
                    <x-table.heading>Actividad</x-table.heading>
                    <x-table.heading>Estado</x-table.heading>
                    <x-table.heading class="flex-shrink-0 w-16"><span class="sr-only">Ver</span></x-table.heading>
                </x-slot>
                <x-slot name="body">
                    @foreach ($actividades as $actividad)
                        <x-table.row :odd="$loop->odd">
                            <x-table.cell>
                                <h1 class="text-gray-800">
                                    {{ $actividad->actividad }}
                                </h1>
                                <small class="text-gray-400">
                                    {{ $actividad->entidad }} :
                                    <span class="italic">
                                        {{ $actividad->proceso }}
                                    </span>
                                </small>
                            </x-table.cell>
                            <x-table.cell class="text-xs leading-5 font-semibold whitespace-nowrap">
                                @if ($actividad->status === 1)
                                    <span
                                        class="px-2 inline-flex rounded-full bg-green-100 text-green-800">
                                        {{ __('Completado') }}
                                    </span>
                                @else
                                    <span
                                        class="px-2 inline-flex rounded-full bg-red-100 text-red-800">
                                        {{ __('Sin completar') }}
                                    </span>
                                @endif
                            </x-table.cell>
                            <x-table.cell class="flex-shrink-0 w-16">
                                <x-button.invisible-link color="blue"
                                                         href="{{ route('actividad.mis-actividades', [$actividad->id, $ciclo_seleccionado]) }}">
                                    <x-icons.go-to class="h-5 w-5" stroke="1.75"></x-icons.go-to>
                                </x-button.invisible-link>
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
    </div>
    @slot('footer')
        <div>
            @if ($completos !== $total)
                <p class="text-sm text-gray-400">
                    * Para culminar las actividades del semestre, tiene que revisar cada uno de ellos y complentarlas.
                </p>
            @endif
        </div>
    @endslot
</x-card>
