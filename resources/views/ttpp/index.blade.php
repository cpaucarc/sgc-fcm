<x-app-layout>

    <x-card>
        <x-slot name="header">
            <div class="flex justify-between items-center">
                <div class="pr-4 flex-1">
                    <h1 class="text-xl font-bold text-gray-800">
                        Lista de sustentaciones de tesis
                    </h1>
                    <p class="text-sm text-gray-400">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis tempora dolor adipisci eaque, ea voluptas quisquam modi ad saepe nisi. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima aperiam similique labore porro temporibus sed tempore laboriosam sapiente, architecto hic.   
                    </p>
                </div>

                <a href="{{ route('ttpp.registro') }}"
                    class="flex-shrink-0 inline-flex items-center px-3 py-1 bg-blue-700 border border-transparent rounded font-semibold text-white tracking-wide hover:bg-blue-800 active:bg-blue-800 focus:outline-none focus:border-blue-800 focus:ring focus:ring-blue-200 disabled:opacity-25 transition">
                    <svg class="h-6 w-6 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    {{ __('Nuevo') }}
                </a>
            </div>
        </x-slot>

        @livewire('ttpp.listar-ttpp')

    </x-card>

</x-app-layout>
