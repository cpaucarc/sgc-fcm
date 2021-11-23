<x-app-layout>


    <x-card>
        <x-slot name="header">
            <div class="flex items-center justify-between">
                <x-title>Lista de usuarios registrados</x-title>
                @livewire('admin.usuario.crear-usuario')
            </div>
        </x-slot>

        @livewire('admin.usuario.listar-usuarios')

    </x-card>


</x-app-layout>
