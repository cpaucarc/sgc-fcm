<x-card>
    <div class="space-y-8 my-4 overflow-hidden">

        <div class="flex justify-between items-center">
            <x-input-dropdown wire:model="cantidad"/>
            <x-input-search wire:model.debounce.500ms="buscar"/>
        </div>

        <x-table total="{{ $investigaciones->total() }}">
            <x-slot name="head">
                <tr>
                    <x-table.heading class="cursor-pointer" wire:click="sortBy('titulo')">
                        <div class="flex items-center justify-between">
                            <span>Título</span>
                            @if($sort === 'titulo')
                                <x-sort-by type="alpha" direction="{{$direccion}}"/>
                            @endif
                        </div>
                    </x-table.heading>

                    <x-table.heading>
                        Escuela
                    </x-table.heading>

                    <x-table.heading class="hidden lg:table-cell">
                        Responsable
                    </x-table.heading>

                    <x-table.heading class="cursor-pointer" wire:click="sortBy('fecha_publicacion')">
                        <div class="flex items-center justify-between">
                            <span>Año</span>
                            @if($sort === 'fecha_publicacion')
                                <x-sort-by type="number" direction="{{$direccion}}"/>
                            @endif
                        </div>
                    </x-table.heading>

                    <x-table.heading>
                        Presupuesto
                    </x-table.heading>

                    <x-table.heading>
                        Estado
                    </x-table.heading>

                    <x-table.heading>
                        <span class="sr-only">Edit</span>
                    </x-table.heading>
                </tr>
            </x-slot>
            <x-slot name="body">
                @foreach($investigaciones as $investigacion)
                    <tr>
                        <x-table.cell class="font-medium text-sm hover:text-gray-900 line-clamp-4 lg:line-clamp-none">
                            {{ $investigacion->titulo }}
                        </x-table.cell>

                        <x-table.cell class="text-xs">
                            {{ $investigacion->escuela->nombre }}
                        </x-table.cell>

                        <x-table.cell class="hidden lg:table-cell">
                            <div class="flex -space-x-2">
                                @foreach($investigacion->responsables as $investigador)
                                    <x-tooltip>
                                        <x-slot name="message">
                                            @if($investigador->docente)
                                                {{ $investigador->docente->persona->apellidos }} {{ $investigador->docente->persona->nombres }}
                                            @else
                                                {{ $investigador->estudiante->persona->apellidos }} {{ $investigador->estudiante->persona->nombres }}
                                            @endif
                                        </x-slot>

                                        @if($investigador->pivot->es_responsable)
                                            <img
                                                class="inline-block h-10 w-10 rounded-full ring-2 ring-indigo-500 shadow-lg transform hover:scale-125"
                                                src="{{ asset( $investigador->foto ) }}" alt="">
                                        @else
                                            <img
                                                class="inline-block h-10 w-10 rounded-full ring-2 ring-white shadow-lg transform hover:scale-125"
                                                src="{{ asset( $investigador->foto ) }}" alt="">
                                        @endif
                                    </x-tooltip>
                                @endforeach
                            </div>
                        </x-table.cell>

                        <x-table.cell class="text-center text-sm">
                            {{ $investigacion->fecha_publicacion->format('Y') }}
                        </x-table.cell>

                        <x-table.cell class="text-right text-xs whitespace-nowrap">
                            S/. {{ $investigacion->presupuestos->sum('pivot.presupuesto') }}
                        </x-table.cell>

                        <x-table.cell class="whitespace-nowrap">
                            <span
                                class="px-3 py-1 inline-flex text-xs font-semibold rounded-full bg-{{ $investigacion->estado->color }}-100 text-{{ $investigacion->estado->color }}-800">
                              {{ $investigacion->estado->nombre }}
                            </span>
                        </x-table.cell>

                        <x-table.cell>
                            <a href="{{ route('investigacion.mostrar', $investigacion->id) }}"
                               class="group inline-flex text-xs items-center px-4 py-2 bg-transparent hover:bg-indigo-100 text-gray-700 hover:text-indigo-700 rounded-lg delay-75 duration-200 ease-in-out font-medium tracking-wide">
                                Revisar
                            </a>
                        </x-table.cell>

                    </tr>
                @endforeach
            </x-slot>
        </x-table>

        <div>
            {{ $investigaciones->links() }}
        </div>
    </div>
</x-card>
