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
                        <input type="number" wire:model.defer="dni" id="dni"
                               class="input-form w-full placeholder-gray-300"
                               placeholder="########">
                        <br>
                        @error('dni')
                        <div class="text-red-500 text-xs">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="flex-1">
                        <x-jet-label for="apellidos">Apellidos</x-jet-label>
                        <input type="text" wire:model.defer="apellidos" id="apellidos" class="input-form w-full">
                        @error('apellidos')
                        <div class="text-red-500 text-xs">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="flex-1">
                        <x-jet-label for="nombres">Nombres</x-jet-label>
                        <input type="text" wire:model.defer="nombres" id="nombres" class="input-form w-full">
                        @error('nombres')
                        <div class="text-red-500 text-xs">
                            {{ $message }}
                        </div>
                        @enderror
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
                        <input type="email" wire:model.defer="correo" id="correo" class="input-form w-full">
                        @error('correo')
                        <div class="text-red-500 text-xs">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="flex-1">
                        <x-jet-label for="password">Contraseña</x-jet-label>
                        <input type="text" wire:model.defer="password" id="password"
                               {{ $toggle ? 'readonly' : '' }} class="input-form w-full">
                        @error('password')
                        <div class="text-red-500 text-xs">
                            {{ $message }}
                        </div>
                        @enderror
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
                <svg wire:loading wire:target="registrar"
                     class="animate-spin -ml-1 mr-3 h-4 w-4 text-white"
                     fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                            stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                          d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <span>
                            {{ __('Registrar usuario') }}
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
            })
        </script>
    @endpush

</div>
