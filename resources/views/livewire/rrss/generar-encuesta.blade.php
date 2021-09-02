<div>
    <x-button-void wire:click="$set('mostrar', true)">
        <svg class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd"
                  d="M12.586 4.586a2 2 0 112.828 2.828l-3 3a2 2 0 01-2.828 0 1 1 0 00-1.414 1.414 4 4 0 005.656 0l3-3a4 4 0 00-5.656-5.656l-1.5 1.5a1 1 0 101.414 1.414l1.5-1.5zm-5 5a2 2 0 012.828 0 1 1 0 101.414-1.414 4 4 0 00-5.656 0l-3 3a4 4 0 105.656 5.656l1.5-1.5a1 1 0 10-1.414-1.414l-1.5 1.5a2 2 0 11-2.828-2.828l3-3z"
                  clip-rule="evenodd"/>
        </svg>
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

            <div class="my-6">

                @if(!$mostrarLink)
                    <x-jet-label for="final">Fecha final</x-jet-label>
                    <div class="flex ">
                        <input type="date" id="final" wire:model="final" class="input-form w-full flex-1 mr-2">
                        <x-jet-button
                            class="mt-1"
                            wire:click="generar"
                            wire:target="generar"
                            wire:loading.class="bg-gray-800"
                            wire:loading.attr="disabled">
                            <svg wire:loading wire:target="generar"
                                 class="animate-spin -ml-1 mr-3 h-4 w-4 text-white"
                                 fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                        stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                      d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            <svg wire:loading.remove wire:target="generar" class="h-5 w-5 mr-1" viewBox="0 0 20 20"
                                 fill="currentColor">
                                <path fill-rule="evenodd"
                                      d="M12.586 4.586a2 2 0 112.828 2.828l-3 3a2 2 0 01-2.828 0 1 1 0 00-1.414 1.414 4 4 0 005.656 0l3-3a4 4 0 00-5.656-5.656l-1.5 1.5a1 1 0 101.414 1.414l1.5-1.5zm-5 5a2 2 0 012.828 0 1 1 0 101.414-1.414 4 4 0 00-5.656 0l-3 3a4 4 0 105.656 5.656l1.5-1.5a1 1 0 10-1.414-1.414l-1.5 1.5a2 2 0 11-2.828-2.828l3-3z"
                                      clip-rule="evenodd"/>
                            </svg>
                            <span>
                            {{ __('Generar link') }}
                        </span>
                        </x-jet-button>
                    </div>
                    <span class="text-gray-600 text-sm inline-flex my-1">
                        <svg class="h-5 w-5 mx-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Luego de esta fecha, la encuesta ya no se podrá responder
                    </span>

                @else
                    <div class="flex items-end">
                        <div class="w-full flex-1 mr-1">
                            <x-jet-label for="link">Link generado</x-jet-label>
                            <input wire:model="link" type="text" id="link" class="input-form w-full bg-gray-50 text-sm">
                        </div>
                        <x-button-void onclick="copyToClipboard()">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75"
                                      d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                            </svg>
                        </x-button-void>
                    </div>
                    <span class="text-gray-600 text-sm inline-flex my-1">
                        <svg class="h-5 w-5 mx-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
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
