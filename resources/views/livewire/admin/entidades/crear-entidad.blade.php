<div>
    <x-button.primary wire:click="$set('abrir', true)">
        <x-icons.plus class="h-5 w-5 mr-1.5"></x-icons.plus>
        Nueva entidad
    </x-button.primary>

    <x-jet-dialog-modal wire:model="abrir" maxWidth="md">

        <x-slot name="title">
            <h1 class="font-bold">
                Crear nueva entidad
            </h1>
            <button wire:click="$set('abrir', false)" class="text-gray-400 hover:text-gray-500">
                <x-icons.x :stroke="1.5" class="h-5 w-5"></x-icons.x>
            </button>
        </x-slot>

        <x-slot name="content">

            <div class="bg-gray-50 rounded p-3">
                <h2 class="text-gray-700 font-semibold">
                    Nombre de la entidad:
                </h2>

                <input type="text" wire:model="nombre" class="input-form w-full">

                <x-jet-input-error for="nombre"></x-jet-input-error>
            </div>

        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('abrir', false)">
                Cerrar
            </x-jet-secondary-button>

            <x-jet-button
                wire:click="guardar"
                wire:target="guardar"
                wire:loading.class="bg-gray-800"
                wire:loading.attr="disabled">
                <x-icons.load class="h-4 w-4" wire:loading wire:target="guardar"></x-icons.load>
                <span>
                    {{ __('Guardar') }}
                </span>
            </x-jet-button>
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
            Livewire.on('error', msg => {
                Swal.fire({
                    icon: 'error',
                    title: '',
                    text: msg,
                });
            });
        </script>
    @endpush

</div>
