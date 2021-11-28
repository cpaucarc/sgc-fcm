<x-card>

    <x-slot name="header">
        <div class="flex justify-between items-center space-x-4">
            <div class="pr-4 flex-1">
                <h1 class="text-xl font-bold text-gray-800">
                    Mis actividades
                </h1>
                <p class="text-sm text-gray-400">
                    En esta sección usted podrá ver la lista de actividades que le corresponde realizar durante el
                    semestre.
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
            <x-simple-progress
                percent="{{$conteo->completado === 0 ? 0 : ($conteo->completado / $conteo->total * 100) }}"
                color="gray">
                Actividades completadas de este proceso:
                <span class="font-bold">{{ $conteo->completado }}</span> de
                <span class="font-bold">{{ $conteo->total }}</span>
            </x-simple-progress>
        </div>

        @if ($conteo->completado !== $conteo->total)
            <x-table>
                <x-slot name="head">
                    <x-table.heading>Actividad</x-table.heading>
                    <x-table.heading>Encargado</x-table.heading>
                    <x-table.heading>Estado</x-table.heading>
                    <x-table.heading class="flex-shrink-0 w-16"><span class="sr-only">Ver</span></x-table.heading>
                </x-slot>
                <x-slot name="body">
                    @foreach ($actividades as $actividad)
                        <x-table.row :odd="$loop->odd">
                            <x-table.cell>
                                <h1 class="font-bold">
                                    {{ $actividad->actividad }}
                                    <span
                                        class="ml-1 rounded-full text-xs px-2 font-semibold {{ $actividad->tipo_id === 1 ? 'text-yellow-800 bg-yellow-100' : ($actividad->tipo_id === 2 ? 'text-indigo-800 bg-indigo-100' : ($actividad->tipo_id === 3 ? 'text-lime-800 bg-lime-100' : 'text-red-800 bg-red-100')) }}">
                                        {{ $actividad->tipo }}
                                    </span>
                                </h1>
                            </x-table.cell>
                            <x-table.cell>
                                {{ $actividad->entidad }}
                            </x-table.cell>
                            <x-table.cell class="text-xs leading-5 font-semibold whitespace-nowrap">
                                <span
                                    class="px-2 inline-flex rounded-full {{$actividad->status === 1 ? 'bg-green-100 text-green-800':'bg-red-100 text-red-800'}}">
                                    {{$actividad->status === 1 ? 'Completado':'No completado'}}
                                </span>
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
            @if ($conteo->completado !== $conteo->total)
                <p class="text-sm text-gray-400">
                    * Para culminar las actividades del semestre, tiene que revisar cada uno de ellos y complentarlas.
                </p>
            @endif
        </div>
    @endslot
</x-card>
