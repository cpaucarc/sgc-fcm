<x-app-layout>

    <x-card>
        <x-slot name="header">
            <div class="flex justify-between items-center">
                <div class="pr-4 flex-1">
                    <h1 class="text-xl font-bold text-gray-800">
                        Lista de Responsabilidades Sociales
                    </h1>
                    <p class="text-sm text-gray-400">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. A adipisci alias aliquam at beatae
                        facilis fugit harum ipsam, iste itaque laborum libero numquam quis quos saepe soluta veritatis.
                        At, nam?
                    </p>
                </div>
                <x-jet-button href="{{ route('rrss.registro') }}" class="flex-shrink-0">
                    <svg class="h-6 w-6 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                              d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                    {{__('Registrar nuevo')}}
                </x-jet-button>
            </div>
        </x-slot>

        @livewire('rrss.listar-rrss')

    </x-card>

</x-app-layout>
