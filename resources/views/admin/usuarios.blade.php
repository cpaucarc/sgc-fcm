<x-app-layout>

    {{--    <div class="text-xs p-4 bg-yellow-300 text-yellow-900">--}}
    {{--        {{ $usuarios }}--}}
    {{--    </div>--}}

    <x-card>

        <x-table>
            <x-slot name="head">
                <x-table.heading>N°</x-table.heading>
                <x-table.heading>Nombres y apellidos</x-table.heading>
                <x-table.heading>Roles</x-table.heading>
                <x-table.heading>Fecha de creación</x-table.heading>
            </x-slot>
            <x-slot name="body">
                @foreach($usuarios as $i => $usuario)
                    <x-table.row :odd="$loop->odd">
                        <x-table.cell>
                            {{ ($i + 1) }}
                        </x-table.cell>
                        <x-table.cell>
                            {{ $usuario->persona->apellidos . ' '.$usuario->persona->nombres }}
                        </x-table.cell>
                        <x-table.cell>
                            <div class="flex flex-wrap gap-x-4">
                                @foreach($usuario->roles as $rol)
                                    <span class="px-4 py-2 bg-gray-200">
                                        {{ $rol->entidad->nombre }}
                                    </span>
                                @endforeach
                            </div>
                        </x-table.cell>
                        <x-table.cell>
                            {{ $usuario->created_at->diffForHumans() }}
                        </x-table.cell>
                    </x-table.row>
                @endforeach

            </x-slot>
        </x-table>

    </x-card>

</x-app-layout>
