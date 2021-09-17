<div class="text-sm text-gray-700">

    <div class="flex justify-between items-center my-6">
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
    @if ($asesores->count())
        <x-table>
            <x-slot name="head">
                <tr>
                    <th scope="col" wire:click="sortBy('telefono')"
                        class="cursor-pointer px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-28">
                        <div class="flex items-center justify-between">
                            <span>Código</span>
                        </div>
                    </th>
                    <th scope="col" wire:click="sortBy('telefono')"
                        class="cursor-pointer px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <div class="flex items-center justify-between">
                            <span>Nombres</span>
                        </div>
                    </th>
                    <th scope="col" wire:click="sortBy('ubicacion')"
                        class="hidden lg:table-cell px-2 cursor-pointer py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">

                        <div class="flex items-center justify-between ">
                            <span>Escuela</span>
                        </div>
                    </th>
                    <th scope="col" wire:click="sortBy('ubicacion')"
                        class="hidden lg:table-cell px-2 cursor-pointer py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">

                        <div class="flex items-center justify-between ">
                            <span>Asesorados</span>
                        </div>
                    </th>
                    <th scope="col" class="relative text-center px-4 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </x-slot>
            <x-slot name="body">
                @foreach ($asesores as $asesor)
                    <tr class="items-center">
                        <td class="px-4 py-4 text-sm font-medium text-gray-900 tracking-wide">
                            {{ $asesor->docente->codigo }}
                        </td>
                        <td class="px-2 py-4 whitespace-nowrap hidden lg:table-cell">
                            <div class="flex items-center my-auto">
                                {{ $asesor->docente->persona->apellidos }}
                                {{ $asesor->docente->persona->nombres }}
                            </div>
                        </td>
                        <td class="px-2 py-4">
                            {{ $asesor->docente->escuela->nombre}}
                        </td>
                        <td class="px-2 py-4 whitespace-nowrap text-sm text-left text-gray-500">
                            {{ $asesor->tesis->count() }}
                        </td>
                        <td class="group px-2 py-4 whitespace-nowrap text-right text-sm font-medium flex gap-x-2 my-4 ">
                            <a href="{{ route('ttpp.asesores', $asesor->id) }}"
                                class="py-1 px-2 flex items-center rounded bg-transparent text-sm text-gray-500 hover:bg-green-100 hover:text-green-800">
                                <svg class="h-4 w-4 mr-1 group-hover:text-green-600" fill="currentColor"
                                    viewBox="0 0 19 19">
                                    <path
                                        d="M3 0h10a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3zm0 8h10a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1H3z" />
                                </svg>
                                Ver
                            </a>
                        </td>
                    </tr>
                @endforeach
            </x-slot>
        </x-table>
        @if ($asesores->hasPages())
            <div class="py-3">
                {{ $asesores->links() }}
            </div>
        @endif
    @else
        <x-empty-search />
    @endif

</div>