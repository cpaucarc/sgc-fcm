<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Información del perfíl') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Actualiza la información de tu cuenta.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}"
                 class="col-span-6 sm:col-span-4 flex border border-dashed p-4 rounded-lg">

                <div class="w-1/2">

                    <!-- Profile Photo File Input -->
                    <input type="file" class="hidden" wire:model="photo" x-ref="photo"
                           x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            "/>

                    <x-jet-label for="photo" value="{{ __('Foto de perfíl') }}"></x-jet-label>

                    <!-- Current Profile Photo -->
                    <div class="mt-2" x-show="! photoPreview">
                        <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}"
                             class="rounded-lg h-32 w-32 object-cover">
                    </div>

                    <!-- New Profile Photo Preview -->
                    <div class="mt-2" x-show="photoPreview">
                        <span class="block rounded-lg h-32 w-32"
                              x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                        </span>
                    </div>
                </div>

                <div class="w-1/2">
                    <x-button.soft class="mt-8 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                        <x-icons.edit class="h-5 w-5 mr-2" stroke="1.5"></x-icons.edit>
                        {{ __('Elegir otra foto') }}
                    </x-button.soft>

                    @if ($this->user->profile_photo_path)
                        <x-button.soft color="red" type="button" class="mt-2"
                                       wire:click="deleteProfilePhoto">
                            <x-icons.x class="h-5 w-5 mr-2" stroke="1.5"></x-icons.x>
                            {{ __('Eliminar foto') }}
                        </x-button.soft>
                    @endif
                </div>
            </div>

            <div class="col-span-6 -mt-6 w-3/5">
                <x-loading-file wire:loading wire:target="photo"></x-loading-file>
                <x-jet-input-error for="photo"></x-jet-input-error>
            </div>

    @endif

    <!-- Email -->
        <div class="col-span-6 sm:col-span-4 -mt-6">
            <x-jet-label for="email"
                         value="{{ __('Correo Electrónico  (Será usado como Usuario para iniciar sesión)') }}"></x-jet-label>
            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email"></x-jet-input>
            <x-jet-input-error for="email" class="mt-2"></x-jet-input-error>
        </div>
    </x-slot>


    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('La información del usuario se ha actualizado correctamente.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Actualizar información') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
