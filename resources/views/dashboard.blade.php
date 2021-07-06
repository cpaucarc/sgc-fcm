<x-app-layout>

    <div class="grid grid-cols-1 gap-y-4 lg:gap-y-0 lg:grid-cols-2 lg:gap-4 ">
        <x-card class="col-span-1">

            @slot('header')
                <h1 class="text-xl font-bold text-gray-800">
                    Actividades Completadas
                </h1>
                <p class="text-sm text-gray-400">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aliquam asperiores, dolorem,
                    impedit, iure iusto magnam maxime nisi non perferendis quam quisquam ratione similique
                    veniam
                    veritatis voluptates voluptatibus? Nostrum, qui!
                </p>
            @endslot

            <x-jet-danger-button>
                <img src="{{ asset('icons/loader.svg') }}" class="h-6 w-6 mr-1 animate-spin" alt="Loader">
                {{ __('Danger') }}
            </x-jet-danger-button>


            <x-slot name="footer">
                <p>
                    Made by magnam maxime nisi non perferendis quam quisquam
                </p>
            </x-slot>
        </x-card>
        <x-card class="col-span-1">

            @slot('header')
                <h1 class="text-xl font-bold text-gray-800">
                    Mis actividades
                </h1>
                <p class="text-sm text-gray-400">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aliquam asperiores, dolorem,
                    impedit, iure iusto magnam maxime nisi non perferendis quam quisquam ratione similique
                    veniam veritatis voluptates voluptatibus? Nostrum, qui!
                </p>
            @endslot

            @livewire('dashboard.actividades-incompletas')

        </x-card>
    </div>

</x-app-layout>
