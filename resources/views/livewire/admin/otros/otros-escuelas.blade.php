<x-card class="w-full lg:w-3/4 mx-auto">
    {{-- The whole world belongs to you. --}}
    @slot('header')
        <div class="flex justify-between items-center">
            <h1 class="text-lg font-bold text-gray-800">
                Escuelas
            </h1>
            <x-button.primary wire:click="abrirModalNuevo">
                <x-icons.plus class="w-4 h-4 mr-2"></x-icons.plus>
                Nueva Escuela
            </x-button.primary>
        </div>
    @endslot

    <div class="flex justify-between">
        <x-input-dropdown wire:model="cantidad"></x-input-dropdown>
        <x-input-search wire:model.debounce.500ms="search"></x-input-search>
    </div>

    <div class="mt-6">
        @if ($escuelas->count())
            <x-table total="{{ $escuelas->total() }}">
                @slot('head')
                    <x-table.heading>Nombre</x-table.heading>
                    <x-table.heading>Facultad</x-table.heading>
                    <x-table.heading><span class="sr-only">Acciones</span></x-table.heading>
                @endslot

                @slot('body')
                    @foreach($escuelas as $escuela)
                        <x-table.row :odd="$loop->odd">
                            <x-table.cell>{{ $escuela->nombre }}</x-table.cell>
                            <x-table.cell>{{ $escuela->facultad->nombre }}</x-table.cell>
                            <x-table.cell class="text-right">
                                <x-button.group>
                                    <x-button.invisible size="sm" color="purple"
                                                        wire:click="abrirModalEditar({{ $escuela->id }})">
                                        <x-icons.edit class="h-4 w-4" stroke="1.5"></x-icons.edit>
                                    </x-button.invisible>
                                    <x-button.invisible size="sm" color="red"
                                                        wire:click="abrirModalEliminar({{ $escuela->id }})">
                                        <x-icons.delete class="h-4 w-4" stroke="1.5"></x-icons.delete>
                                    </x-button.invisible>
                                </x-button.group>
                            </x-table.cell>
                        </x-table.row>
                    @endforeach
                @endslot
            </x-table>

            @if ($escuelas->hasPages())
                <div class="py-3">
                    {{ $escuelas->links() }}
                </div>
            @endif
        @else
            <x-empty-search></x-empty-search>
        @endif
    </div>

    <x-jet-dialog-modal wire:model="abrir" maxWidth="lg">

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
                    <x-jet-label>{{ __('Facultad') }}
                        <select wire:model.defer="facultad" class="input-form w-full">
                            @if(!is_null($facultades))
                                <option value="0">Selecciona</option>
                                @foreach($facultades as $fac)
                                    <option value="{{ $fac->id }}">{{ $fac->nombre }}</option>
                                @endforeach
                            @else
                                <option value="0">No hay ninguna facultad</option>
                            @endif
                        </select>
                    </x-jet-label>
                    <x-jet-input-error for="facultad"></x-jet-input-error>
                </div>

                <div>
                    <x-jet-label>{{ __('Nombre de la nueva escuela') }}
                        <input type="text" wire:model.defer="escuela_nombre" class="input-form w-full">
                    </x-jet-label>
                    <x-jet-input-error for="escuela_nombre"></x-jet-input-error>
                </div>
            </div>

        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('abrir', false)">
                Cerrar
            </x-jet-secondary-button>

            <x-jet-button
                wire:click="crearEscuela"
                wire:target="crearEscuela"
                wire:loading.class="bg-gray-800"
                wire:loading.attr="disabled">
                <x-icons.load class="h-4 w-4" wire:loading wire:target="crearEscuela"></x-icons.load>
                {{ __('Guardar') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

    <x-jet-confirmation-modal wire:model="abrirEliminar">
        <x-slot name="title">
            ¿Quiere eliminar la escuela {{ $escuela_nombre }}?
        </x-slot>
        <x-slot name="content">
            <p class="text-gray-700 tracking-wide mt-4">
                La escuela <strong>{{ $escuela_nombre }}</strong> será eliminado de los registros.
                <br>
                Esta acción es irreversible, ¿Quiere continuar?
            </p>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('abrirEliminar', false)">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click="eliminarEscuela">
                Eliminar Escuela
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
