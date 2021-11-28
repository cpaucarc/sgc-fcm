<div>
    <x-button-void wire:click="$set('mostrar', true)">
        <x-icons.link class="h-5 w-5 mr-2"></x-icons.link>
        <span class="hidden md:block">
            Link de encuesta
        </span>
    </x-button-void>

    <x-jet-dialog-modal wire:model="mostrar" maxWidth="lg">
        <x-slot name="title">
            <h1 class="font-semibold text-gray-600 text-lg">
                Generar link
            </h1>
            <button wire:click="$set('mostrar', false)">
                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                          d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                          clip-rule="evenodd"/>
                </svg>
            </button>
        </x-slot>

        <x-slot name="content">

            <div class="my-4">

                @if(!$mostrarLink)
                    <x-jet-label for="final">Fecha de expiración de encuesta</x-jet-label>
                    <div class="flex space-x-4">
                        <input type="date" id="final" wire:model="final" class="input-form w-full flex-1 mr-2">
                        <x-jet-button
                            class="mt-1"
                            wire:click="generar"
                            wire:target="generar"
                            wire:loading.class="bg-gray-800"
                            wire:loading.attr="disabled">
                            <x-icons.load wire:loading wire:target="generar" class="h-5 w-5"></x-icons.load>
                            <x-icons.link wire:loading.remove wire:target="generar" class="h-5 w-5 mr-2"></x-icons.link>
                            <span>
                            {{ __('Generar link') }}
                        </span>
                        </x-jet-button>
                    </div>
                    <x-jet-input-error for="final"></x-jet-input-error>

                    <span class="text-gray-600 text-sm inline-flex mt-2">
                        <x-icons.info class="h-5 w-5 mr-1"></x-icons.info>
                        Luego de esta fecha, la encuesta ya no se podrá responder
                    </span>

                @else
                    <div class="flex items-end space-x-4">
                        <div class="w-full flex-1 mr-1">
                            <x-jet-label for="link">Link generado</x-jet-label>
                            <input wire:model="link" type="text" id="link" class="input-form w-full bg-gray-50 text-sm">
                        </div>
                        <x-button-void onclick="copyToClipboard()">
                            <x-icons.clipboard class="h-5 w-5"></x-icons.clipboard>
                        </x-button-void>
                    </div>
                    <span class="text-gray-600 text-sm inline-flex mt-2">
                        <x-icons.info class="h-5 w-5 mr-1"></x-icons.info>
                        Puede copiar este enlace y compartir con las personas de interes.
                    </span>
                @endif

            </div>


        </x-slot>

    </x-jet-dialog-modal>

    @push('js')
        <script>
            function copyToClipboard() {
                document.getElementById('link').select();
                document.execCommand('copy');
            }
        </script>
    @endpush

</div>
