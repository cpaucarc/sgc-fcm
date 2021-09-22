<x-app-layout>

    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h1 class="font-bold md:text-xl text-gray-800">
                Responsabilidad Social Universitaria
            </h1>
            <div class="flex justify-end gap-x-4">
                <a href="{{ route('rrss.empresas') }}"
                   class="px-4 py-2 bg-transparent text-sm text-gray-500 hover:text-gray-800 border border-gray-300 flex items-center rounded">
                    <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                              d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                    Empresas
                </a>

                <a href="{{ route('indicadores.indicadores', [9, "Responsabilidad_Social"]) }}"
                   class="px-4 py-2 bg-transparent text-sm text-gray-500 hover:text-gray-800 border border-gray-300 flex items-center rounded">
                    <x-icons.presentation-chart :stroke="1.5" class="h-5 w-5 mr-2"></x-icons.presentation-chart>
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
                        Lista de Responsabilidades Sociales
                    </h1>
                    <p class="text-sm text-gray-400">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. A adipisci alias aliquam at beatae
                        facilis fugit harum ipsam, iste itaque laborum libero numquam quis quos saepe soluta veritatis.
                        At, nam?
                    </p>
                </div>

                <a href="{{ route('rrss.registro') }}"
                   class="flex-shrink-0 inline-flex items-center px-3 py-1 bg-blue-700 border border-transparent rounded font-semibold text-white tracking-wide hover:bg-blue-800 active:bg-blue-800 focus:outline-none focus:border-blue-800 focus:ring focus:ring-blue-200 disabled:opacity-25 transition">
                    <svg class="h-6 w-6 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                              d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                    {{ __('Nuevo') }}
                </a>
            </div>
        </x-slot>

        @livewire('rrss.listar-rrss')

    </x-card>

</x-app-layout>
