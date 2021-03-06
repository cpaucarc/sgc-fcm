<div>

    <x-jet-dialog-modal wire:model="open">

        <x-slot name="title">
            <h1 class="font-bold">
                Clientes asignados para la salida {{ $salida->descripcion }}
            </h1>
            <button wire:click="$set('open', false)" class="text-gray-400 hover:text-gray-500">
                <x-icons.x :stroke="1.5" class="h-5 w-5"></x-icons.x>
            </button>
        </x-slot>

        <x-slot name="content">
            <h1>{{ $salida->descripcion }}</h1>
            <h1>{{ $salida->codigo }}</h1>
            <h1>{{ $salida->id }}</h1>

            <x-table>
                <x-slot name="head">
                    <tr>
                        <th scope="col"
                            class="py-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Id
                        </th>
                        <th scope="col"
                            class="py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Entidad/Oficina
                        </th>
                        <th scope="col"
                            class="py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Nivel
                        </th>
                    </tr>
                </x-slot>
                <x-slot name="body">
                    @foreach($salida->clientes as $cliente)
                        <x-table.row :odd="$loop->odd">
                            <td class="py-2 whitespace-nowrap text-center">
                                {{ $cliente->cliente->entidad->id }}
                            </td>
                            <td class="py-2 whitespace-nowrap text-left">
                                {{ $cliente->cliente->entidad->nombre }}
                            </td>
                            <td class="py-2 whitespace-nowrap text-left">
                                {{ $cliente->cliente->entidad->nivel->nombre }}
                            </td>
                            </x-table.row>
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
