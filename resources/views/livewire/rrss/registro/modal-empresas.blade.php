<div>
    <div class="flex items-center mb-4 justify-between">
        <h1 class="font-bold text-gray-600">Lista de empresas registradas</h1>
        <div class="flex items-center w-1/2">
            <label for="search"
                   class="px-3 py-1 text-gray-400">
                <x-icons.search :stroke="1.75" class="h-6 w-6"></x-icons.search>
            </label>
            <input type="text" id="search" wire:model="search" class="input-form-b flex-1 py-1">
        </div>
    </div>

    @if($empresas->count())
        <x-table>
            <x-slot name="head">
                <tr>
                    <th scope="col"
                        class="p-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Empresa
                    </th>
                    <th scope="col"
                        class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        RUC
                    </th>
                    <th scope="col"
                        class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Direccion
                    </th>
                    <th scope="col" class="relative text-center px-2 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </x-slot>
            <x-slot name="body">
                @foreach($empresas as $emp)
                    <tr>
                        <td class="px-3 py-3 text-sm font-medium text-gray-800 tracking-wide">
                            {{ $emp->nombre }}
                        </td>
                        <td class="px-2 py-3 whitespace-nowrap text-sm text-gray-500">
                            {{ $emp->ruc }}
                        </td>
                        <td class="px-4 py-3 text-gray-500">
                            <div class="flex-col text-xs">
                                <span class="block">{{ $emp->direccion }}</span>
                                <span class="block text-gray-400">{{ $emp->ubicacion }}</span>
                            </div>

                        </td>
                        <td class="px-2 py-3 whitespace-nowrap text-right text-sm font-medium">
                            <button wire:click="$emit('enviarEmpresa', {{ $emp }})"
                                    class=" group py-1 px-2 flex items-center rounded bg-transparent text-sm text-gray-400 hover:bg-yellow-200 hover:text-yellow-800 transition duration-300 ease-in-out">
                                <svg
                                    class="h-4 w-4 mr-1 text-transparent group-hover:text-yellow-800 transition duration-300 ease-in-out"
                                    fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Escoger
                            </button>
                        </td>
                    </tr>
                @endforeach
            </x-slot>
        </x-table>
    @else
        <x-empty-search/>
    @endif

    <div class="text-center w-full mt-4">
        <label for="search" class="text-gray-400">
            Si no encuentras la empresa que estas buscando, usa el
            <span class="cursor-pointer font-bold text-gray-700">buscador</span>
        </label>
    </div>
</div>
