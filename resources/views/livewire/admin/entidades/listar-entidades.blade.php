<div>
    <div class="bg-gray-50 p-4 flex items-center justify-between mb-10 rounded-lg">
        <x-input-dropdown wire:model="cantidad"></x-input-dropdown>
        <div class="flex items-center space-x-2">
            <x-input-search wire:model="buscar"></x-input-search>
            @livewire('admin.entidades.crear-entidad')
        </div>
    </div>


    <div class="grid grid-cols-3 gap-x-8 gap-y-10">
        @forelse($entidades as $entidad)

            <div class="p-4 group rounded-lg bg-white">
                <div class="">
                    <x-jet-dropdown align="right" width="32">
                        <x-slot name="trigger">
                            <div class="flex justify-end">
                                <button class="cursor-pointer text-gray-300 hover:text-gray-600 text-xs">
                                    <x-icons.dots-horizontal class="h-6 w-6"></x-icons.dots-horizontal>
                                </button>
                            </div>
                        </x-slot>

                        <x-slot name="content">
                            <div class="space-y-2">
                                <x-button.drop-link href="{{ route('admin.entidad', $entidad->id) }}" target="_blank">
                                    <x-icons.go-to stroke="1.5"
                                                   class="h-5 w-5 mr-2 text-gray-500 group-hover:text-gray-600"></x-icons.go-to>
                                    <span class="text-gray-500 group-hover::text-gray-600">
                                        {{ __('Revisar') }}
                                    </span>
                                </x-button.drop-link>
                                <x-button.drop wire:click="eliminar({{ $entidad->id }})">
                                    <x-icons.delete stroke="1.5"
                                                    class="h-5 w-5 mr-2 text-red-500 group-hover:text-red-600"></x-icons.delete>
                                    <span class="text-red-500 group-hover::text-red-600">
                                        {{ __('Eliminar') }}
                                    </span>
                                </x-button.drop>
                            </div>
                        </x-slot>
                    </x-jet-dropdown>
                </div>

                <h2 class="font-semibold text-xl text-gray-500 group-hover:text-gray-700">
                    {{ $entidad->nombre }}
                </h2>

                <div class="mt-4 space-y-2">
                    @if($entidad->actividades_count)
                        <p class="inline-flex px-2 py-1 bg-indigo-100 group-hover:bg-indigo-200 text-gray-800 rounded text-xs">
                            Responsable de {{ $entidad->actividades_count }} actividad(es)
                        </p>
                    @endif

                    @if($entidad->entradas_count)
                        <p class="inline-flex px-2 py-1 bg-yellow-100 group-hover:bg-yellow-200 text-gray-800 rounded text-xs">
                            Proveedor en {{ $entidad->entradas_count }} entrada(s)
                        </p>
                    @endif

                    @if($entidad->salidas_count)
                        <p class="inline-flex px-2 py-1 bg-green-100 group-hover:bg-green-200 text-gray-800 rounded text-xs">
                            Cliente en {{ $entidad->salidas_count }} salida(s)
                        </p>
                    @endif


                </div>
            </div>

        @empty
            <x-empty-search></x-empty-search>
        @endforelse
    </div>
    <div class="mt-4">
        {{ $entidades->links() }}
    </div>


</div>
