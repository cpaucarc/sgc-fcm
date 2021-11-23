<div>
    <x-button.primary wire:click="$set('abrir', true)">
        <x-icons.plus class="w-4 h-5 mr-1"></x-icons.plus>
        Registrar nuevo usuario
    </x-button.primary>

    <x-jet-dialog-modal wire:model="abrir" maxWidth="3xl">

        <x-slot name="title">
            <h1 class="font-bold">
                Registrar a un nuevo usuario
            </h1>
            <button wire:click="$set('abrir', false)" class="text-gray-400 hover:text-gray-500">
                <x-icons.x :stroke="1.5" class="h-5 w-5"></x-icons.x>
            </button>
        </x-slot>

        <x-slot name="content">

            <div class="mb-4 bg-gray-50 p-4 rounded space-y-4">
                <h2 class="font-semibold text-lg text-gray-600">
                    Datos personales
                </h2>
                <div class="flex gap-4">
                    <div class="w-28">
                        <x-jet-label for="dni">DNI</x-jet-label>
                        <input type="text" wire:model.defer="dni" id="dni" maxlength="8"
                               class="input-form w-full placeholder-gray-300" autocomplete="off"
                               placeholder="########">

                        <x-jet-input-error for="dni"></x-jet-input-error>
                    </div>
                    <div class="flex-1">
                        <x-jet-label for="apellidos">Apellidos</x-jet-label>
                        <input type="text" autocomplete="off" wire:model.defer="apellidos" id="apellidos"
                               class="input-form w-full">

                        <x-jet-input-error for="apellidos"></x-jet-input-error>
                    </div>
                    <div class="flex-1">
                        <x-jet-label for="nombres">Nombres</x-jet-label>
                        <input type="text" autocomplete="off" wire:model.defer="nombres" id="nombres"
                               class="input-form w-full">

                        <x-jet-input-error for="nombres"></x-jet-input-error>
                    </div>
                </div>
            </div>

            <div class="mb-4 bg-gray-50 p-4 rounded space-y-4">
                <h2 class="font-semibold text-lg text-gray-600">
                    Datos de acceso
                </h2>
                <div class="flex gap-4">
                    <div class="flex-1">
                        <x-jet-label for="correo">Correo Electrónico/Usuario</x-jet-label>
                        <input type="email" autocomplete="off" wire:model.defer="correo" id="correo"
                               class="input-form w-full">

                        <x-jet-input-error for="correo"></x-jet-input-error>
                    </div>
                    <div class="flex-1">
                        <x-jet-label for="password">Contraseña</x-jet-label>
                        <input type="text" autocomplete="off" wire:model.defer="password" id="password"
                               {{ $toggle ? 'readonly' : '' }} class="input-form w-full">

                        <x-jet-input-error for="password"></x-jet-input-error>

                        <label class="text-gray-600 text-xs px-1 mt-3 cursor-pointer">
                            <input type="checkbox" wire:model="toggle" class="rounded ring-0">
                            Usar <strong>DNI</strong> como contraseña
                        </label>
                    </div>
                </div>
            </div>

        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('abrir', false)">
                Cancelar
            </x-jet-secondary-button>

            <x-jet-button
                wire:click="registrar"
                wire:target="registrar"
                wire:loading.class="bg-gray-800"
                wire:loading.attr="disabled">
                <x-icons.load wire:loading wire:target="registrar" class="h-4 w-4"></x-icons.load>
                {{ __('Registrar usuario') }}
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
            })
        </script>
    @endpush

</div>
