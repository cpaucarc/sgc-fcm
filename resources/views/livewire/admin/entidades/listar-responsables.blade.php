<div>
    <div class="space-y-1">

        <div class="grid place-items-center mb-4">
            <x-button.soft color="indigo" wire:click="abrirModal" class="mb-6">
                <x-icons.plus class="h-4 w-4 mr-2" stroke="1.5"></x-icons.plus>
                Asignar nueva responsabilidad
            </x-button.soft>

            <x-items-matched total="{{ $actividades->count() }}"></x-items-matched>
        </div>

        @forelse($actividades as $act_resp)
            <div class="px-4 py-2 group flex items-center justify-between bg-transparent hover:bg-gray-50 rounded-lg">
                <div>
                    <h2 class="font-semibold text-gray-600 group-hover:text-gray-700">
                        {{ $act_resp->actividad->nombre }}
                    </h2>
                    <h3 class="text-xs text-gray-500 group-hover:text-gray-600">
                        Proceso de {{ $act_resp->actividad->proceso->nombre }}
                    </h3>
                </div>

                <button wire:click="eliminar({{ $act_resp->id }})"
                        class="flex-shrink-0 h-6 w-6 rounded-full bg-white group-hover:bg-red-100 grid place-items-center">
                    <x-icons.x class="h-4 w-4 text-white group-hover:text-red-600"></x-icons.x>
                </button>
            </div>
        @empty
            <div class="grid place-items-center">
                <div class="text-center w-2/3 font-semibold text-gray-500">
                    No se ha asignado ninguna responsabilidad a esta entidad
                </div>
            </div>
        @endforelse

    </div>

    <x-jet-dialog-modal wire:model="abrir">

        <x-slot name="title">
            <h1 class="font-bold">
                Lista de actividades aún no asignadas a esta entidad
            </h1>
            <button wire:click="$set('abrir', false)" class="text-gray-400 hover:text-gray-500">
                <x-icons.x :stroke="1.5" class="h-5 w-5"></x-icons.x>
            </button>
        </x-slot>

        <x-slot name="content">

            @if($actividades_no_asignadas)

                <p class="font-light text-gray-700 mb-4 rounded">
                    @if(count($selected))
                        Haz
                        seleccionado {{ count($selected) }} {{ count($selected) == 1 ? 'actividad' : 'actividades' }}
                    @else
                        No haz seleccionado ninguna actividad
                    @endif
                </p>

                <x-table>
                    <x-slot name="head">
                        <x-table.heading><span class="sr-only">Seleccionar</span></x-table.heading>
                        <x-table.heading>Actividad</x-table.heading>
                        <x-table.heading>Proceso</x-table.heading>
                        <x-table.heading>Tipo</x-table.heading>
                    </x-slot>
                    <x-slot name="body">
                        @foreach ($actividades_no_asignadas as $actividad_no_asignada)
                            <x-table.row :odd="$loop->odd">
                                <x-table.cell class="text-xs">
                                    <input type="checkbox" wire:model="selected"
                                           value="{{ $actividad_no_asignada->id }}"
                                           class="cursor-pointer rounded border border-gray-300 text-indigo-600 focus:ring-0 focus:ring-white">
                                </x-table.cell>
                                <x-table.cell class="text-xs">
                                    {{ $actividad_no_asignada->nombre }}
                                </x-table.cell>
                                <x-table.cell class="text-xs">
                                    {{ $actividad_no_asignada->proceso->nombre }}
                                </x-table.cell>
                                <x-table.cell class="text-xs">
                                    {{ $actividad_no_asignada->tipoActividad->nombre }}
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
                    <div class="px-3 py-1 bg-indigo-100 text-indigo-900 text-sm font-semibold rounded-lg">
                        Actividades Seleccionadas: <span class="font-bold">{{ count($selected) }}</span>
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
