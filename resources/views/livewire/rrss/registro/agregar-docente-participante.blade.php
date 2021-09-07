<x-card>
    <x-slot name="header">
        <div class="flex justify-between items-center text-blue-800 font-bold">
            <div class="flex items-center">
                <h3 class="text-lg mr-2">Docentes</h3>
                <p class="mt-1 text-sm h-6 w-6 rounded-full bg-blue-200 flex items-center justify-center">
                    {{$docentes_participantes->count()}}
                </p>
            </div>
            <x-button wire:click="abrirModal"
                      class="bg-blue-100 hover:bg-blue-200 text-blue-800 hover:text-blue-900">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                          d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
                Agregar
            </x-button>
        </div>
    </x-slot>

    <div class="space-y-4 py-2 text-gray-700 text-sm">
        @foreach($docentes_participantes as $dcpt)
            <div class="flex justify-between items-center p-2 bg-gray-100 hover:bg-gray-200 rounded-md">
                <h2>{{$dcpt->apellidos}} {{$dcpt->nombres}}</h2>
                <button wire:click="eliminar({{ $dcpt->id }})"
                        class="text-gray-400 bg-transparent rounded hover:text-red-600 hover:bg-red-300">
                    <x-icons.x :stroke="1.5" class="h-5 w-5"/>
                </button>
            </div>
        @endforeach
    </div>

    <x-jet-dialog-modal wire:model="abrir">
        <x-slot name="content">
            @livewire('rrss.registro.modal-docentes')
        </x-slot>
    </x-jet-dialog-modal>

</x-card>

