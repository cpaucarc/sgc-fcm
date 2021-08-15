<div>
    <div class="flex items-center justify-end">
        <h1 class="bg-yellow-100 text-yellow-800 font-bold tracking-wider">Lista</h1>
        {{ $indicador->facultad_id }}
        <h1 class="bg-yellow-100 text-yellow-800 font-bold tracking-wider">Lista</h1>
    </div>
    <br>
    <div class="flex items-center justify-end">
        <x-jet-dropdown align="right" width="32">
            <x-slot name="trigger">
                <x-button-void type="button"
                               class="inline-flex items-center px-3 py-2 border text-sm leading-4 font-medium rounded-md text-gray-500 hover:text-gray-700 focus:outline-none transition">
                    Ciclo

                    <svg class="ml-2 -mr-0.5 h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/>
                    </svg>
                </x-button-void>
            </x-slot>

            <x-slot name="content">
                <button
                    class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition w-full text-left">
                    Uno
                </button>
                <button
                    class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition w-full text-left">
                    Dos
                </button>
            </x-slot>
        </x-jet-dropdown>
        <x-jet-dropdown align="right" width="32" class="bg-white">
            <x-slot name="trigger">
                <x-button-void type="button"
                               class="inline-flex items-center px-3 py-2 border text-sm leading-4 font-medium rounded-md text-gray-500 hover:text-gray-700 focus:outline-none transition">
                    Ciclo

                    <svg class="ml-2 -mr-0.5 h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/>
                    </svg>
                </x-button-void>
            </x-slot>

            <x-slot name="content">
                <button
                    class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition w-full text-left">
                    Uno
                </button>
                <button
                    class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition w-full text-left">
                    Dos
                </button>
            </x-slot>
        </x-jet-dropdown>
    </div>
</div>
