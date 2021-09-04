<div>
    @if ($escuela)
        <div class="flex items-center mb-4 justify-between">
            <h1 class="font-bold text-gray-600 truncate">
                Lista de docentes de
                <span class="text-gray-800 font-black tracking-wide uppercase">{{ $escuela->nombre }}</span>
            </h1>
            <div class="flex items-center w-1/2">
                <label for="searchD" class="px-3 py-1 text-gray-400">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </label>
                <input type="text" id="searchD" wire:model="search" class="input-form-b flex-1 py-1">
            </div>
        </div>

        @if ($docentes->count())
            <x-table>
                <x-slot name="head">
                    <tr>
                        <th scope="col" class="p-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Docente
                        </th>
                        <th scope="col"
                            class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            DNI
                        </th>
                        <th scope="col"
                            class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Código
                        </th>
                        <th scope="col" class="relative text-center px-2 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </x-slot>
                <x-slot name="body">
                    @foreach ($docentes as $dc)
                        <tr>
                            <td class="px-3 py-3 text-sm font-medium text-gray-800 tracking-wide">
                                {{ $dc->apellidos }} {{ $dc->nombres }}
                            </td>
                            <td class="px-2 py-3 whitespace-nowrap text-sm text-gray-500">
                                {{ $dc->dni }}
                            </td>
                            <td class="px-4 py-3 text-gray-500 text-sm">
                                {{ $dc->codigo }}
                            </td>
                            <td class="px-2 py-3 whitespace-nowrap text-right text-sm font-medium">
                                <button wire:click="enviarDocenteJurado({{ $dc->id }})"
                                    class=" group py-1 px-2 flex items-center rounded bg-transparent text-sm text-gray-400 hover:bg-blue-200 hover:text-blue-800 transition duration-300 ease-in-out">
                                    <svg class="h-4 w-4 mr-1 text-transparent group-hover:text-blue-800 transition duration-300 ease-in-out"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Escoger
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </x-slot>
            </x-table>
        @else
            <x-empty-search />
        @endif

        <div class="text-center w-full mt-4">
            <label for="searchD" class="text-gray-400">
                Si no encuentras al docente que estas buscando, usa el
                <span class="cursor-pointer font-bold text-gray-700">buscador</span>
            </label>
        </div>
    @else
        <h1 class="font-bold text-red-600 text-lg">
            Debe de seleccionar una escuela
        </h1>
    @endif
</div>
