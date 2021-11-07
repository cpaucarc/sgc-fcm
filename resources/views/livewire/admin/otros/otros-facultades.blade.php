<x-card class="w-full lg:w-4/5 mx-auto">
    {{-- The whole world belongs to you. --}}
    @slot('header')
        <div class="flex justify-between items-center">
            <h1 class="text-lg font-bold text-gray-800">
                Facultades
            </h1>
            <x-button.primary wire:click="abrirModalNuevo">
                <x-icons.plus class="w-4 h-4 mr-2"></x-icons.plus>
                Nueva Facultad
            </x-button.primary>
        </div>
    @endslot

    <div class="flex justify-between">
        <x-input-dropdown wire:model="cantidad"></x-input-dropdown>
        <x-input-search wire:model.debounce.500ms="search"></x-input-search>
    </div>

    <div class="mt-6">
        @if ($facultades->count())
            <x-table total="{{ $facultades->total() }}">
                @slot('head')
                    <x-table.heading>Nombre</x-table.heading>
                    <x-table.heading>Dirección</x-table.heading>
                    <x-table.heading class="text-center">Abreviatura</x-table.heading>
                    <x-table.heading><span class="sr-only">Acciones</span></x-table.heading>
                @endslot

                @slot('body')
                    @foreach($facultades as $facultad)
                        <x-table.row :odd="$loop->odd">
                            <x-table.cell>{{ $facultad->nombre }}</x-table.cell>
                            <x-table.cell>{{ $facultad->direccion }}</x-table.cell>
                            <x-table.cell class="text-center">{{ $facultad->abrev }}</x-table.cell>
                            <x-table.cell class="text-right whitespace-nowrap">

                                <x-button.group>
                                    <x-button.invisible size="sm" color="purple"
                                                        wire:click="abrirModalEditar({{ $facultad->id }})">
                                        <x-icons.edit class="h-4 w-4" stroke="1.5"></x-icons.edit>
                                    </x-button.invisible>
                                    <x-button.invisible size="sm" color="red"
                                                        wire:click="abrirModalEliminar({{ $facultad->id }})">
                                        <x-icons.delete class="h-4 w-4" stroke="1.5"></x-icons.delete>
                                    </x-button.invisible>
                                </x-button.group>

                            </x-table.cell>
                        </x-table.row>
                    @endforeach
                @endslot
            </x-table>

            @if ($facultades->hasPages())
                <div class="py-3">
                    {{ $facultades->links() }}
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
                    <x-jet-label>{{ __('Nombre de la nueva facultad') }}
                        <input type="text" wire:model.defer="fac_nombre" class="input-form w-full">
                    </x-jet-label>
                    <x-jet-input-error for="fac_nombre"></x-jet-input-error>
                </div>
                <div>
                    <x-jet-label>{{ __('Dirección de la facultad') }}
                        <input type="text" wire:model.defer="fac_direccion" class="input-form w-full">
                    </x-jet-label>
                    <x-jet-input-error for="fac_direccion"></x-jet-input-error>
                </div>
                <div>
                    <x-jet-label>{{ __('Abreviatura de la facultad') }}
                        <br>
                        <input type="text" wire:model.defer="fac_abrev" class="input-form w-32 uppercase"
                               maxlength="10">
                    </x-jet-label>
                    <x-jet-input-error for="fac_abrev"></x-jet-input-error>
                </div>
            </div>

        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('abrir', false)">
                Cerrar
            </x-jet-secondary-button>

            <x-jet-button
                wire:click="crearFacultad"
                wire:target="crearFacultad"
                wire:loading.class="bg-gray-800"
                wire:loading.attr="disabled">
                <x-icons.load class="h-4 w-4" wire:loading wire:target="crearFacultad"></x-icons.load>
                {{ __('Guardar') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

    <x-jet-confirmation-modal wire:model="abrirEliminar">
        <x-slot name="title">
            ¿Quiere eliminar la escuela {{ $fac_nombre }}?
        </x-slot>
        <x-slot name="content">
            <p class="text-gray-700 tracking-wide mt-4">
                La escuela <strong>{{ $fac_nombre }}</strong> será eliminado de los registros.
                <br>
                Esta acción es irreversible, ¿Quiere continuar?
            </p>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('abrirEliminar', false)">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click="eliminarFacultad">
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
