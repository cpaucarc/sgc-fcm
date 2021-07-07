<x-app-layout>

    {{ $actividad }}

    <div class="grid grid-cols-5 gap-6">
        <div class="col-span-5 lg:col-span-2">
            <x-card>
                <div class="space-y-2">
                    <h1 class="text-xl font-bold text-gray-600">Entradas</h1>
                    @foreach( $actividad->entradas as $ep)
                        <div class="border border-gray-200 rounded-lg py-1 px-3 shadow-sm">
                            <h2 class="text-gray-800 truncate">
                                {{ $ep->entrada->descripcion }}
                            </h2>
                            <p class="text-gray-500 truncate text-sm">
                                {{ $ep->proveedor->entidad->nombre }}
                            </p>
                        </div>
                    @endforeach
                </div>


                <div class="mt-6">
                    <h1 class="text-xl font-bold text-gray-600">Salidas</h1>
                </div>
            </x-card>

        </div>
        <div class="col-span-5 lg:col-span-3">
            <x-card>
                <div class="flex justify-between">
                    <h1 class="text-2xl text-blue-500 font-bold">
                        {{ $actividad->nombre }}
                    </h1>

                    @if($actividad->estado == 1)
                        <x-jet-secondary-button>
                            Marcar como completado
                        </x-jet-secondary-button>
                    @else
                        <x-jet-button>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M5 13l4 4L19 7"/>
                            </svg>
                            Completado
                        </x-jet-button>
                    @endif


                </div>
            </x-card>
        </div>
    </div>


</x-app-layout>
