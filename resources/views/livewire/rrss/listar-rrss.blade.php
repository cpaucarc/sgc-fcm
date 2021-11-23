<div class="text-sm text-gray-700">

    <div class="flex justify-between items-center mb-4">
        <div class="inline-flex items-center space-x-2">
            <x-input-dropdown-general label="Ciclo:" bold="true" wire:model="ciclo_sel">
                @forelse($ciclos as $c)
                    <option value="{{ $c->id }}">{{ $c->nombre }}</option>
                @empty
                    <option value="0">No hay datos</option>
                @endforelse
            </x-input-dropdown-general>
            <x-input-dropdown wire:model="cantidad"></x-input-dropdown>
        </div>
        <x-input-search wire:model="search"></x-input-search>
    </div>

    @if($rrss)
        <x-table total="{{ $rrss->total() }}">
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
                    <x-table.heading>Estado</x-table.heading>
                    <x-table.heading><span class="sr-only">Edit</span></x-table.heading>
                </tr>
            </x-slot>
            <x-slot name="body">
                @foreach($rrss as $rs)
                    <x-table.row :odd="$loop->odd">
                        <x-table.cell class="line-clamp-2">{{ $rs->titulo }}</x-table.cell>
                        <x-table.cell>{{ $rs->escuela->nombre }}</x-table.cell>
                        <x-table.cell>{{ $rs->lugar }}</x-table.cell>
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
                        <x-table.cell class="inline-flex text-right">
                            @if( $rs->fecha_fin > today())
                                <x-button.invisible-link color="blue" href="{{ route('rrss.editar', $rs->id) }}">
                                    <x-icons.edit class="h-4 w-4 mr-1" stroke="1.5"></x-icons.edit>
                                    Editar
                                </x-button.invisible-link>
                            @endif
                            <x-button.invisible-link color="green" href="{{ route('rrss.index', $rs->id) }}">
                                <x-icons.go-to class="h-4 w-4 mr-1" stroke="1.5"></x-icons.go-to>
                                Ver
                            </x-button.invisible-link>
                        </x-table.cell>
                    </x-table.row>
                @endforeach
            </x-slot>
        </x-table>
        @if( $rrss->hasPages() )
            <div class="py-3">
                {{ $rrss->links() }}
            </div>
        @endif
    @else
        <x-empty-search></x-empty-search>
    @endif

</div>
