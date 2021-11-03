<div class="text-sm text-gray-700">
    {{-- Cabecera de lista --}}
    <div class="flex justify-between items-center my-4">
        <div class="flex justify-between items-center">
            <div class="mr-5">
                <x-jet-dropdown align="right" width="24">
                    <x-slot name="trigger">
                        <button type="button"
                            class="inline-flex items-center px-3 py-2 border text-sm leading-4 font-medium rounded-md text-gray-500 hover:text-gray-700 focus:outline-none transition">
                            Mostrar {{ $cantidad }} registros
                            <x-icons.dropdown :stroke="1.25" class="ml-1 -mr-0.5 h-4 w-4"></x-icons.dropdown>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <button wire:click="setCantidad(5)"
                            class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition w-full text-left">
                            {{ __('5') }}
                        </button>
                        <button wire:click="setCantidad(10)"
                            class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition w-full text-left">
                            {{ __('10') }}
                        </button>
                        <button wire:click="setCantidad(25)"
                            class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition w-full text-left">
                            {{ __('25') }}
                        </button>
                        <button wire:click="setCantidad(50)"
                            class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition w-full text-left">
                            {{ __('50') }}
                        </button>
                        <button wire:click="setCantidad(100)"
                            class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition w-full text-left">
                            {{ __('100') }}
                        </button>
                    </x-slot>
                </x-jet-dropdown>
            </div>
        </div>
        <div class="flex items-center relative">
            <label for="search" class="px-3 py-1 text-gray-400">
                <x-icons.search :stroke="1.75" class="h-6 w-6"></x-icons.search>
            </label>
            <input type="text" id="search" wire:model="search" class="input-form-b py-1">
            @if ($search)
                <button wire:click="$set('search', '')"
                    class="px-2 absolute top-1 right-0 text-lg text-gray-500 hover:text-gray-600">
                    &times;
                </button>
            @endif
        </div>
    </div>
    {{-- Tabla --}}
    @if ($vacantes->count())
        <x-table>
            <x-slot name="head">
                <tr>
                    <th scope="col" wire:click="sortBy('nombre')"
                        class="cursor-pointer px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <div class="flex items-center justify-between">
                            <span>Escuela</span>
                        </div>
                    </th>
                    <th scope="col" wire:click="sortBy('nombre')"
                        class="cursor-pointer px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <div class="flex items-center justify-between">
                            <span>Ciclo</span>
                        </div>
                    </th>
                    <th scope="col" wire:click="sortBy('nombre')"
                        class="cursor-pointer px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <div class="flex items-center justify-between">
                            <span>Vacantes</span>
                        </div>
                    </th>
                    <th scope="col" wire:click="sortBy('telefono')"
                        class="cursor-pointer px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <div class="flex items-center justify-between">
                            <span>Fecha Inicio</span>
                        </div>
                    </th>
                    <th scope="col" wire:click="sortBy('ubicacion')"
                        class="hidden lg:table-cell px-2 cursor-pointer py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <div class="flex items-center justify-between ">
                            <span>Fecha Fin</span>
                        </div>
                    </th>
                </tr>
            </x-slot>
            <x-slot name="body">
                @foreach ($vacantes as $vacante)
                    <x-table.row :odd="$loop->odd">
                        <td class="px-4 py-4 text-sm font-medium text-gray-900 tracking-wide">
                            {{ $vacante->escuela }}
                        </td>
                        <td class="px-4 py-4 text-sm font-medium text-gray-900 tracking-wide">
                            {{ $vacante->ciclo }}
                        </td>
                        <td class="px-4 py-4 text-sm font-medium text-gray-900 tracking-wide">
                            {{ $vacante->vacantes }}
                        </td>
                        <td class="px-2 py-4">
                            {{ $vacante->fecha_inicio }}
                        </td>
                        <td class="px-2 py-4">
                            {{ $vacante->fecha_fin }}
                        </td>
                    </x-table.row>
                @endforeach
            </x-slot>
        </x-table>
        @if ($vacantes->hasPages())
            <div class="py-3">
                {{ $vacantes->links() }}
            </div>
        @endif
    @else
        <x-empty-search />
    @endif
</div>
