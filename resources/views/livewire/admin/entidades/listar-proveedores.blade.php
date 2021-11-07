<div>
    <div class="space-y-1">

        <div class="grid place-items-center mb-4">
            <x-button.soft color="yellow" wire:click="abrirModal" class="mb-6">
                <x-icons.plus class="h-4 w-4 mr-2" stroke="1.5"></x-icons.plus>
                Asignar nueva entrada a proveer
            </x-button.soft>

            <x-items-matched total="{{ $entradas->count() }}"></x-items-matched>

        </div>


        @forelse($entradas as $ent_prov)

            <div class="px-4 py-2 group flex items-center justify-between bg-transparent hover:bg-gray-50 rounded-lg">
                <div>
                    <h2 class="font-semibold text-gray-600 group-hover:text-gray-700">
                        {{ $ent_prov->entrada->nombre }}
                    </h2>
                    <h3 class="text-xs font-semibold text-gray-500 group-hover:text-gray-600">
                        Actividad: {{ $ent_prov->actividad->nombre }}
                    </h3>
                    <h3 class="text-xs text-gray-500 group-hover:text-gray-600">
                        Proceso de {{ $ent_prov->entrada->proceso->nombre }}
                    </h3>
                </div>

                <button wire:click="eliminar({{ $ent_prov->id }})"
                        class="flex-shrink-0 h-6 w-6 rounded-full bg-white group-hover:bg-red-100 grid place-items-center">
                    <x-icons.x class="h-4 w-4 text-white group-hover:text-red-600"></x-icons.x>
                </button>
            </div>
        @empty
            <div class="grid place-items-center">
                <div class="text-center w-2/3 font-semibold text-gray-500">
                    No se ha asignado ninguna entrada que deba proveer esta entidad
                </div>
            </div>
        @endforelse

    </div>

    <x-jet-dialog-modal wire:model="abrir">

        <x-slot name="title">
            <h1 class="font-bold">
                Lista de entradas aún no asignadas a esta entidad
            </h1>
            <button wire:click="$set('abrir', false)" class="text-gray-400 hover:text-gray-500">
                <x-icons.x :stroke="1.5" class="h-5 w-5"></x-icons.x>
            </button>
        </x-slot>

        <x-slot name="content">

            <div class="grid grid-cols-2 mb-6 gap-x-6">
                <div>
                    <h4 class="font-bold text-gray-600">
                        Procesos
                    </h4>
                    <select class="input-form w-full" wire:model="proceso_seleccionado">
                        @if($procesos)
                            <option value="0">Seleccione...</option>
                            @foreach($procesos as $proceso)
                                <option value="{{ $proceso->id }}">
                                    <div class="flex items-center justify-between">
                                        <p class="text-gray-800">
                                            {{ $proceso->nombre }}
                                        </p>
                                    </div>
                                </option>
                            @endforeach
                        @else
                            <option value="0">No hay ningún proceso</option>
                        @endif
                    </select>
                </div>
                <div>
                    <h4 class="font-bold text-gray-600">
                        Actividades
                    </h4>
                    <select class="input-form w-full" wire:model="actividad_seleccionado">
                        <option value="0">Seleccione...</option>
                        @if($actividades)
                            @foreach($actividades as $actividad)
                                <option value="{{ $actividad->id }}">{{ $actividad->nombre }}</option>
                            @endforeach
                        @else
                            <option value="0">No hay ninguna actividad</option>
                        @endif
                    </select>
                </div>
            </div>

            <h4 class="font-bold text-gray-600">
                Lista de entradas
            </h4>
            @if($entradas_no_asignadas)

                <p class="font-light text-gray-700 mb-2 rounded">
                    @if(count($selected))
                        Haz
                        seleccionado {{ count($selected) }} {{ count($selected) == 1 ? 'entrada' : 'entradas' }}
                    @else
                        No haz seleccionado ninguna entrada
                    @endif
                </p>

                <x-table total="{{ $entradas_no_asignadas->count() }}">
                    <x-slot name="head">
                        <x-table.heading><span class="sr-only">Seleccionar</span></x-table.heading>
                        <x-table.heading>Entrada</x-table.heading>
                        <x-table.heading>Proceso</x-table.heading>
                    </x-slot>
                    <x-slot name="body">


                        @foreach($entradas_no_asignadas as $entrada_no_asignada)
                            <x-table.row :odd="$loop->odd">
                                <x-table.cell class="text-xs">
                                    <input type="checkbox" wire:model="selected"
                                           value="{{ $entrada_no_asignada->id }}"
                                           class="cursor-pointer rounded border border-gray-300 text-yellow-600 focus:ring-0 focus:ring-white">
                                </x-table.cell>
                                <x-table.cell class="text-xs">
                                    {{ $entrada_no_asignada->nombre }}
                                </x-table.cell>
                                <x-table.cell class="text-xs">
                                    {{ $entrada_no_asignada->proceso->nombre }}
                                </x-table.cell>
                            </x-table.row>
                        @endforeach
                    </x-slot>
                </x-table>
            @else
                <p>
                    No hay actividades para mostrar
                </p>
            @endif

        </x-slot>
        <x-slot name="footer">

            <div class="w-full flex items-center justify-between">
                @if(count($selected))
                    <div class="px-3 py-1 bg-yellow-100 text-yellow-900 text-sm font-semibold rounded-lg">
                        Entradas Seleccionadas: <span class="font-bold">{{ count($selected) }}</span>
                    </div>
                @else
                    <div></div>
                @endif

                <div>
                    <x-jet-secondary-button wire:click="$set('abrir', false)">
                        Cancelar
                    </x-jet-secondary-button>

                    @if(count($selected))
                        <x-jet-button
                            wire:click="guardar"
                            wire:target="guardar, selected"
                            wire:loading.class="bg-gray-800"
                            wire:loading.attr="disabled">
                            <x-icons.load class="h-4 w-4" wire:loading wire:target="guardar"></x-icons.load>
                            {{ __('Asignar') }}
                        </x-jet-button>
                    @endif
                </div>
            </div>

        </x-slot>
    </x-jet-dialog-modal>

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
        </script>
    @endpush

</div>
