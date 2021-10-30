<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h1 class="font-bold text-xl text-gray-800">
                Estudiantes con grado de titulo
            </h1>
            <div class="relative">
                <div
                    class="absolute -top-2 -right-2 bg-red-600 ring ring-white text-sm font-bold text-white rounded-full h-6 w-6 grid place-items-center">
                    5
                </div>
                <x-button.ghost-link href="{{ route('ttpp.solicitudes') }}">
                    <x-icons.people class="h-5 w-5 mr-1"></x-icons.people>
                    Revisar solicitudes
                </x-button.ghost-link>
            </div>
        </div>
    </x-slot>
    <x-card class="py-4">
        @livewire('ttpp.listar-titulados')
    </x-card>
</x-app-layout>
