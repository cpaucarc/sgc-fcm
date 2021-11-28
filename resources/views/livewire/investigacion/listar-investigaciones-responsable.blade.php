<div>
    <x-table total="{{ $investigaciones->total() }}">
        <x-slot name="head">
            <x-table.heading>Título</x-table.heading>
            <x-table.heading>Año</x-table.heading>
            <x-table.heading>Presupuesto</x-table.heading>
            <x-table.heading>Estado</x-table.heading>
            <x-table.heading>Rol</x-table.heading>
            <x-table.heading><span class="sr-only">Edit</span></x-table.heading>
        </x-slot>
        <x-slot name="body">
            @foreach($investigaciones as $inv)
                <x-table.row :odd="$loop->odd">
                    <x-table.cell class="line-clamp-4 lg:line-clamp-none">
                        {{ $inv->investigacion->titulo }}
                    </x-table.cell>

                    <x-table.cell class="text-center">
                        {{ $inv->investigacion->fecha_publicacion->format('Y') }}
                    </x-table.cell>

                    <x-table.cell class="text-right whitespace-nowrap">
                        S/. {{ $inv->investigacion->presupuestos->sum('pivot.presupuesto') }}
                    </x-table.cell>

                    <x-table.cell class="whitespace-nowrap">
                            <span
                                class="px-3 py-1 text-xs font-semibold rounded-full bg-{{ $inv->investigacion->estado->color }}-200 text-{{ $inv->investigacion->estado->color }}-800">
                              {{ $inv->investigacion->estado->nombre }}
                            </span>
                    </x-table.cell>

                    <x-table.cell class="whitespace-nowrap">
                        <span
                            class="rounded-full text-xs font-semibold px-3 py-1 {{ $inv->es_responsable ? 'bg-purple-200 text-purple-800' : 'bg-gray-200 text-gray-800' }}">
                            {{ $inv->es_responsable ? 'Responsable' : 'Corresponsable' }}
                        </span>
                    </x-table.cell>

                    <x-table.cell>
                        {{--                        <a --}}
                        {{--                           class="group inline-flex text-xs items-center px-4 py-2 bg-transparent hover:bg-indigo-100 text-gray-700 hover:text-indigo-700 rounded-lg delay-75 duration-200 ease-in-out font-medium tracking-wide">--}}
                        {{--                            --}}
                        {{--                        </a>--}}
                        <x-button.invisible-link color="green"
                                                 href="{{ route('investigacion.mostrar', $inv->investigacion->id) }}">
                            Revisar
                        </x-button.invisible-link>
                    </x-table.cell>

                </x-table.row>
            @endforeach
        </x-slot>
    </x-table>

    <div>
        {{ $investigaciones->links() }}
    </div>

</div>
