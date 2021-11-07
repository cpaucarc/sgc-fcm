<x-jet-form-section submit="updatePassword">
    <x-slot name="title">
        {{ __('Actualizar Contraseñas') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Asegúrese de que su cuenta esté usando una contraseña larga y aleatoria para mantenerse seguro.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="current_password" value="{{ __('Contraseña Actual') }}"></x-jet-label>
            <x-jet-input id="current_password" type="password" class="mt-1 block w-full"
                         wire:model.defer="state.current_password"></x-jet-input>
            <x-jet-input-error for="current_password" class="mt-2"></x-jet-input-error>
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="password" value="{{ __('Contraseña Nueva') }}"></x-jet-label>
            <x-jet-input id="password" type="password" class="mt-1 block w-full"
                         wire:model.defer="state.password"></x-jet-input>
            <x-jet-input-error for="password" class="mt-2"></x-jet-input-error>
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="password_confirmation" value="{{ __('Confirmar Nueva Contraseña') }}"></x-jet-label>
            <x-jet-input id="password_confirmation" type="password" class="mt-1 block w-full"
                         wire:model.defer="state.password_confirmation"></x-jet-input>
            <x-jet-input-error for="password_confirmation" class="mt-2"></x-jet-input-error>
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('La contraseña se ha actualizado correctamente.') }}
        </x-jet-action-message>

        <x-jet-button>
            {{ __('Actualizar contraseñas') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
