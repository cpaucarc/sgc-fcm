<div>

    {{--    <x-jet-secondary-button wire:click="$set('open', true)">--}}
    {{--        Mostrar Clientes--}}
    {{--    </x-jet-secondary-button>--}}

    <button wire:click="$set('open', true)"
            class="py-1 px-2 flex items-center rounded bg-transparent text-sm text-gray-400 hover:bg-blue-50 hover:text-blue-700">
        <svg class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
        </svg>
        Clientes
    </button>


    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            <h1 class="text-gray-800 font-bold text-sm lg:text-xl">
                Clientes asignados para la salida {{ $salida->descripcion }}
            </h1>
        </x-slot>
        <x-slot name="content">
            <h1>{{ $salida->descripcion }}</h1>
            <h1>{{ $salida->codigo }}</h1>
            <h1>{{ $salida->id }}</h1>

            <x-table>
                <x-slot name="head">
                    <tr>
                        <th scope="col"
                            class="pl-4 pr-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Id
                        </th>
                        <th scope="col"
                            class="px-1 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Entidad/Oficina
                        </th>
                        <th scope="col"
                            class="px-1 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Nivel
                        </th>
                    </tr>
                </x-slot>
                <x-slot name="body">
                    @foreach($salida->clientes as $cliente)
                        <tr>
                            <td class="pl-4 pr-2 py-4 text-sm whitespace-nowrap text-center">
                                {{ $cliente->cliente->entidad->id }}
                            </td>
                            <td class="px-1 py-4 whitespace-nowrap">
                                {{ $cliente->cliente->entidad->nombre }}
                            </td>
                            <td class="pr-4 pl-2 py-4 whitespace-nowrap text-right text-sm font-medium">
                                {{ $cliente->cliente->entidad->nivel->nombre }}
                            </td>
                        </tr>
                    @endforeach
                </x-slot>
            </x-table>

        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open', false)">
                Cerrar
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>

</div>