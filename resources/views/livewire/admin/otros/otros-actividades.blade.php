<x-card class="w-full">
    @slot('header')
        <div class="flex justify-between items-center">
            <h1 class="text-lg font-bold text-gray-800">
                Actividades
            </h1>
            <x-button.primary wire:click="abrirModalNuevo">
                <x-icons.plus class="w-4 h-4 mr-2"></x-icons.plus>
                Nueva Actividad
            </x-button.primary>
        </div>
    @endslot

    <div class="flex justify-between">
        <x-input-dropdown wire:model="cantidad"></x-input-dropdown>

        <x-input-dropdown-general bold label="Proceso:" wire:model="proceso_seleccionado">
            @forelse($procesos as $proceso)
                <option value="{{ $proceso->id }}">{{ $proceso->nombre }}</option>
            @empty
                <option value="0">No hay ningun proceso</option>
            @endforelse
        </x-input-dropdown-general>

        <x-input-search wire:model.debounce.500ms="search"></x-input-search>
    </div>

    <div class="mt-6">
        @if ($actividades->count())
            <x-table total="{{ $actividades->total() }}">
                @slot('head')
                    <x-table.heading>Actividad</x-table.heading>
                    <x-table.heading>Tipo Actividad</x-table.heading>
                    <x-table.heading><span class="sr-only">Acciones</span></x-table.heading>
                @endslot

                @slot('body')
                    @foreach($actividades as $act)
                        <x-table.row :odd="$loop->odd">
                            <x-table.cell class="font-semibold">{{ $act->nombre }}</x-table.cell>
                            <x-table.cell>
                                <span
                                    class="whitespace-nowrap rounded-full px-3 py-1 font-semibold {{ $act->tipoActividad->id === 1 ? 'text-yellow-800 bg-yellow-100' : ($act->tipoActividad->id === 2 ? 'text-indigo-800 bg-indigo-100' : ($act->tipoActividad->id === 3 ? 'text-lime-800 bg-lime-100' : 'text-red-800 bg-red-100')) }}">
                                {{ $act->tipoActividad->nombre }}
                                </span>
                            </x-table.cell>
                            <x-table.cell class="text-right">
                                <x-button.group>
                                    <x-button.invisible size="sm" color="purple"
                                                        wire:click="abrirModalEditar({{ $act->id }})">
                                        <x-icons.edit class="h-4 w-4" stroke="1.5"></x-icons.edit>
                                    </x-button.invisible>
                                    <x-button.invisible size="sm" color="red"
                                                        wire:click="abrirModalEliminar({{ $act->id }})">
                                        <x-icons.delete class="h-4 w-4" stroke="1.5"></x-icons.delete>
                                    </x-button.invisible>
                                </x-button.group>
                            </x-table.cell>
                        </x-table.row>
                    @endforeach
                @endslot
            </x-table>

            @if ($actividades->hasPages())
                <div class="py-3">
                    {{ $actividades->links() }}
                </div>
            @endif
        @else
            <x-empty-search></x-empty-search>
        @endif
    </div>

    <x-jet-dialog-modal wire:model="abrir">

        <x-slot name="title">
            <h1 class="font-bold">
                {{ $nombreModal }}
            </h1>
            <button wire:click="$set('abrir', false)" class="text-gray-400 hover:text-gray-500">
                <x-icons.x :stroke="1.5" class="h-5 w-5"></x-icons.x>
            </button>
        </x-slot>

        <x-slot name="content">

            <div class="py-4 px-6 bg-gray-50 rounded-lg space-y-6">
                <div>
                    <x-jet-label>{{ __('Proceso') }}
                        <select wire:model="proceso_seleccionado" class="input-form w-full">
                            @forelse($procesos as $proceso)
                                <option value="{{ $proceso->id }}">{{ $proceso->nombre }}</option>
                            @empty
                                <option value="0">No hay ningún proceso</option>
                            @endforelse
                        </select>
                    </x-jet-label>
                    <x-jet-input-error for="proceso_seleccionado"></x-jet-input-error>
                </div>
                <div>
                    <x-jet-label>{{ __('Tipo de Actividad') }}
                        <select wire:model.defer="tipo_seleccionado" class="input-form w-full">
                            @if(!is_null($tipos))
                                <option value="0">Seleccione...</option>
                                @foreach($tipos as $tipo)
                                    <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                                @endforeach
                            @else
                                <option value="0">No hay ningún tipo de actividad</option>
                            @endif
                        </select>
                    </x-jet-label>
                    <x-jet-input-error for="tipo_seleccionado"></x-jet-input-error>
                </div>

                <div>
                    <x-jet-label>{{ __('Nombre de la nueva actividad') }}
                        <input type="text" wire:model.defer="nombre_actividad" class="input-form w-full">
                    </x-jet-label>
                    <x-jet-input-error for="nombre_actividad"></x-jet-input-error>
                </div>

            </div>

        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('abrir', false)">
                Cerrar
            </x-jet-secondary-button>

            <x-jet-button
                wire:click="crearActividad"
                wire:target="crearActividad"
                wire:loading.class="bg-gray-800"
                wire:loading.attr="disabled">
                <x-icons.load class="h-4 w-4" wire:loading wire:target="crearActividad"></x-icons.load>
                {{ __('Guardar') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

    <x-jet-confirmation-modal wire:model="abrirEliminar">
        <x-slot name="title">
            ¿Quiere eliminar la actividad llamada {{ $nombreModal }}?
        </x-slot>
        <x-slot name="content">
            <p class="text-gray-700 tracking-wide mt-4">
                La actividad <strong>{{ $nombreModal }}</strong> será eliminado de los registros.
                <br>
                Esta acción es irreversible, ¿Quiere continuar?
            </p>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('abrirEliminar', false)">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click="eliminarActividad">
                Eliminar Actividad
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>

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
            Livewire.on('error', msg => {
                Swal.fire({
                    icon: 'error',
                    title: '',
                    text: msg,
                });
            });
        </script>
    @endpush

</x-card>
