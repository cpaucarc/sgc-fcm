<x-app-layout>

    <x-card>
        <x-slot name="header">
            <div class="flex justify-between items-center">
                <div class="pr-4 flex-1">
                    <h1 class="text-xl font-bold text-gray-800">
                        Lista de titulados
                    </h1>
                    <p class="text-sm text-gray-400">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis tempora dolor adipisci eaque, ea
                        voluptas quisquam modi ad saepe nisi. Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Minima aperiam similique labore porro temporibus sed tempore laboriosam sapiente, architecto
                        hic.
                    </p>
                </div>
            </div>
        </x-slot>

        @livewire('ttpp.listar-titulados')

    </x-card>

</x-app-layout>
