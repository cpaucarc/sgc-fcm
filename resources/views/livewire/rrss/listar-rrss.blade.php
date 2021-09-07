<div class="text-sm text-gray-700">

    <div class="flex justify-end items-center my-6">
        <x-jet-dropdown align="right" width="32">
            <x-slot name="trigger">
                <button type="button"
                        class="inline-flex items-center px-3 py-2 border text-sm leading-4 font-medium rounded-md text-gray-500 hover:text-gray-700 focus:outline-none transition">
                    Ciclo {{$ciclo_sel->nombre}}
                    <x-icons.dropdown :stroke="1.5" class="ml-2 -mr-0.5 h-4 w-4"/>
                </button>
            </x-slot>

            <x-slot name="content">
                @foreach($ciclos as $cl)
                    <button wire:click="setCiclo({{ $cl }})"
                            class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition w-full text-left">
                        {{ $cl->nombre }}
                    </button>
                @endforeach
            </x-slot>
        </x-jet-dropdown>
    </div>

    <div class="flex justify-between items-center my-6">
        <x-jet-dropdown align="right" width="24">
            <x-slot name="trigger">
                <button type="button"
                        class="inline-flex items-center px-3 py-2 border text-sm leading-4 font-medium rounded-md text-gray-500 hover:text-gray-700 focus:outline-none transition">
                    Mostrar {{$cantidad}} registros
                    <x-icons.dropdown :stroke="1.5" class="ml-2 -mr-0.5 h-4 w-4"/>
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

        <x-input-search wire:model="search"/>
    </div>

    <x-items-matched total="{{ $rrss->total() }}"/>

    @if($rrss->count())
        <x-table>
            <x-slot name="head">
                <tr>
                    <x-table.heading wire:click="sortBy('nombre')" class="cursor-pointer">
                        <div class="flex items-center justify-between">
                            <span>Titulo</span>
                            {{--                            @if($sort === 'nombre')--}}
                            {{--                                <x-sort-by type="alpha" direction="{{$direction}}"/>--}}
                            {{--                            @endif--}}
                        </div>
                    </x-table.heading>

                    <x-table.heading wire:click="sortBy('telefono')" class="cursor-pointer">
                        <div class="flex items-center justify-between">
                            <span>Escuela</span>
                            {{--                            @if($sort === 'telefono')--}}
                            {{--                                <x-sort-by type="number" direction="{{$direction}}"/>--}}
                            {{--                            @endif--}}
                        </div>
                    </x-table.heading>

                    <x-table.heading wire:click="sortBy('telefono')" class="cursor-pointer">
                        <div class="flex items-center justify-between">
                            <span>Lugar</span>
                            {{--                            @if($sort === 'telefono')--}}
                            {{--                                <x-sort-by type="number" direction="{{$direction}}"/>--}}
                            {{--                            @endif--}}
                        </div>
                    </x-table.heading>

                    <x-table.heading wire:click="sortBy('ubicacion')" class="hidden lg:table-cell">
                        <div class="flex items-center justify-between ">
                            <span>Empresa</span>
                            {{--                            @if($sort === 'direccion')--}}
                            {{--                                <x-sort-by type="alpha" direction="{{$direction}}"/>--}}
                            {{--                            @endif--}}
                        </div>
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
                @foreach($rrss as $rs)
                    <tr>
                        <x-table.cell>
                            {{ $rs->titulo }}
                        </x-table.cell>
                        <x-table.cell>
                            {{ $rs->escuela->nombre }}
                        </x-table.cell>
                        <x-table.cell>
                            {{ $rs->lugar }}
                        </x-table.cell>
                        <x-table.cell class="whitespace-nowrap hidden lg:table-cell">
                            {{ $rs->empresa ? $rs->empresa->nombre : __('---') }}
                        </x-table.cell>
                        <x-table.cell class="whitespace-nowrap">
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                        {{ $rs->fecha_fin > today() ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'}}">
                              {{ $rs->fecha_fin > today() ? __('Falta') : __('Terminado') }} {{ $rs->fecha_fin->diffForHumans() }}
                            </span>
                        </x-table.cell>
                        <x-table.cell>
                            @if( $rs->fecha_fin > today())
                                <a href="{{ route('rrss.editar', $rs->id) }}"
                                   class="py-1 px-2 flex items-center rounded bg-transparent text-sm text-gray-500 hover:bg-blue-100 hover:text-blue-800">
                                    <svg class="h-4 w-4 mr-1 group-hover:text-blue-600" fill="none" viewBox="0 0 24 24"
                                         stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                              d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                    </svg>
                                    Editar
                                </a>
                            @endif
                            <a href="{{ route('rrss.index', $rs->id) }}"
                               class="py-1 px-2 flex items-center rounded bg-transparent text-sm text-gray-500 hover:bg-green-100 hover:text-green-800">
                                <svg class="h-4 w-4 mr-1 group-hover:text-green-600" fill="currentColor"
                                     viewBox="0 0 19 19">
                                    <path
                                        d="M3 0h10a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3zm0 8h10a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1H3z"/>
                                </svg>
                                Ver
                            </a>
                        </x-table.cell>
                    </tr>
                @endforeach
            </x-slot>
        </x-table>
        @if( $rrss->hasPages() )
            <div class="py-3">
                {{ $rrss->links() }}
            </div>
        @endif
    @else
        <x-empty-search/>
    @endif

</div>
