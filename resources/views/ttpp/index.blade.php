<x-app-layout>

    <x-slot name="header">

        <div class="flex justify-between items-center">
            <h1 class="font-bold md:text-xl text-gray-800">
                Sustentación de Tesis
            </h1>
            <div class="flex justify-end gap-x-4">
                <a href="{{ route('ttpp.titulados') }}"
                    class="px-4 py-2 bg-transparent text-sm text-gray-500 hover:text-gray-800 border border-gray-300 flex items-center rounded">
                    <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    Titulados
                </a>
                <a href="#"
                    class="px-4 py-2 bg-transparent text-sm text-gray-500 hover:text-gray-800 border border-gray-300 flex items-center rounded">
                    <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
                    </svg>
                    Indicadores
                </a>
            </div>
        </div>

    </x-slot>

    <x-card>
        <x-slot name="header">
            <div class="flex justify-between items-center">
                <div class="pr-4 flex-1">
                    <h1 class="text-xl font-bold text-gray-800">
                        Lista de Sustentaciones de Tesis
                    </h1>
                    <p class="text-sm text-gray-400">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis tempora dolor adipisci eaque, ea
                        voluptas quisquam modi ad saepe nisi. Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Minima aperiam similique labore porro temporibus sed tempore laboriosam sapiente, architecto
                        hic.
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
