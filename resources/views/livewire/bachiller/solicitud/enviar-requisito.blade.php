<div>
    <x-jet-button wire:click="$set('abrir', true)">
        <x-icons.plus :stroke="1.5" class="h-5 w-5 mr-2"></x-icons.plus>
        {{ __('Subir requisito') }}

    </x-jet-button>

    <x-jet-dialog-modal wire:model="abrir">

        <x-slot name="title">
            <h1 class="font-bold">
                Subir requisito faltante

            </h1>
            <button wire:click="$set('abrir', false)" class="text-gray-400 hover:text-gray-500">
                <x-icons.x :stroke="1.5" class="h-5 w-5"></x-icons.x>
            </button>
        </x-slot>

        <x-slot name="content">

            <div class="my-6 space-y-4">
                <div class="px-2 py-4 bg-gray-50 rounded-lg flex flex-col items-center">
                    <x-jet-label for="requisito">Requisitos faltantes</x-jet-label>
                    <select wire:model="requisitoSeleccionado" id="requisito"
                            class="input-form font-bold pr-4 w-3/5">
                        <option value="0">Seleccione...</option>
                        @foreach( $requisitos as $rqto )
                            <option value="{{ $rqto->id }}">{{ $rqto->nombre }}</option>
                        @endforeach
                    </select>

                    <x-jet-input-error for="requisitoSeleccionado"></x-jet-input-error>
                </div>

                <div class="p-4 rounded-lg">
                    <x-jet-label for="archivo">Archivo</x-jet-label>
                    <input type="file" wire:model="archivo"
                           class="input-form w-full focus:outline-none px-4 py-6 border-dashed mb-2">
                    <x-loading-file wire:loading wire:target="archivo"></x-loading-file>
                    <x-jet-input-error for="archivo"></x-jet-input-error>
                </div>

            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('abrir', false)">
                Cerrar
            </x-jet-secondary-button>

            <x-jet-button
                wire:click="guardarDocumento"
                wire:target="guardarDocumento, archivo"
                wire:loading.class="bg-gray-800"
                wire:loading.attr="disabled">
                <x-icons.load wire:loading wire:target="guardarDocumento" class="h-5 w-5"></x-icons.load>
                {{ __('Guardar') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

    @push('js')
        <script>
            window.addEventListener('guardado', event => {
                alert('Mensaje del sistema: ' + event.detail.message);
            })
        </script>
    @endpush

</div>
