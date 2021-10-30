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
                <div class="px-2 py-4 bg-gray-100 rounded-lg text-center">
                    <x-jet-label for="requisito">Requisitos faltantes</x-jet-label>
                    <select wire:model="requisitoSeleccionado" id="requisito"
                            class="input-form font-bold pr-4 w-3/5">
                        <option value="0">Seleccione...</option>
                        @foreach( $requisitos as $rqto )
                            <option value="{{ $rqto->id }}">{{ $rqto->nombre }}</option>
                        @endforeach
                    </select>
                    <br>
                    @error('requisitoSeleccionado')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="px-2 py-4 rounded-lg">
                    <x-jet-label for="archivo">Archivo</x-jet-label>

                    <input type="file" wire:model="archivo"
                           class="input-form w-full px-4 py-6 border-dashed">

                    <x-loading-file wire:loading wire:target="archivo"></x-loading-file>

                    @error('archivo')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                    @enderror
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
                {{--                <svg wire:loading wire:target="enviarDocumento"--}}
                {{--                     class="animate-spin -ml-1 mr-3 h-4 w-4 text-white"--}}
                {{--                     fill="none" viewBox="0 0 24 24">--}}
                {{--                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"--}}
                {{--                            stroke-width="4"></circle>--}}
                {{--                    <path class="opacity-75" fill="currentColor"--}}
                {{--                          d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>--}}
                {{--                </svg>--}}

                <x-icons.load wire:loading wire:target="guardarDocumento" class="h-5 w-5"></x-icons.load>

                <span>
                            {{ __('Guardar') }}
                        </span>
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
