<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="my-8 bg-white border border-gray-200 py-4 rounded-md">
                <x-jet-secondary-button class="ml-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mt-1 animate-bounce" fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                    </svg>
                </x-jet-secondary-button>

                <x-jet-secondary-button class="ml-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 animate-ping" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"/>
                    </svg>
                </x-jet-secondary-button>

                <x-jet-secondary-button class="ml-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 animate-spin" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z"/>
                    </svg>
                </x-jet-secondary-button>

                <x-jet-button class="ml-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 animate-spin" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z"/>
                    </svg>
                    {{ __('Primary') }}
                </x-jet-button>
                <x-jet-secondary-button class="ml-4">
                    {{ __('Secondary') }}
                </x-jet-secondary-button>
                <x-jet-danger-button class="ml-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 animate-spin" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z"/>
                    </svg>
                    {{ __('Danger') }}
                </x-jet-danger-button>

                <x-jet-danger-button class="ml-4">
                    <img src="{{ asset('icons/loader.svg') }}" class="h-6 w-6 mr-1 animate-spin" alt="Loader">
                    {{ __('Danger') }}
                </x-jet-danger-button>
            </div>

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome/>
            </div>
        </div>
    </div>
</x-app-layout>
