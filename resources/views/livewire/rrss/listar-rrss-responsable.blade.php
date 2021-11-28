<div>
    @if($rsu)
        {{--        total="{{ $rsu->total() }}" --}}
        <x-table total="{{ $rsu->total() }}">
            <x-slot name="head">
                <tr>
                    <x-table.heading>Titulo</x-table.heading>
                    <x-table.heading>Lugar</x-table.heading>
                    <x-table.heading>Estado</x-table.heading>
                    <x-table.heading>Rol</x-table.heading>
                    <x-table.heading><span class="sr-only">Edit</span></x-table.heading>
                </tr>
            </x-slot>
            <x-slot name="body">
                @foreach($rsu as $rs)
                    <x-table.row :odd="$loop->odd">
                        <x-table.cell class="line-clamp-2">{{ $rs->titulo }}</x-table.cell>
                        <x-table.cell>
                            {{ $rs->lugar }}
                            <br>
                            @if($rs->empresa)
                                <small>Empresa: <i>{{ $rs->empresa->nombre }}</i></small>
                            @endif
                        </x-table.cell>
                        <x-table.cell class="whitespace-nowrap">
                            <span
                                class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full
                                        {{ $rs->fecha_fin > today() ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'}}">
                              {{ $rs->fecha_fin > today() ? __('Falta') : __('Terminado') }} {{ $rs->fecha_fin->diffForHumans() }}
                            </span>
                        </x-table.cell>
                        <x-table.cell>
                            <span
                                class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full
                                        {{ $rs->es_participante ? 'bg-gray-100 text-gray-800' : 'bg-purple-200 text-purple-800'}}">
                              {{ $rs->es_participante ? __('Participante') : __('Responsable') }}
                            </span>
                        </x-table.cell>
                        <x-table.cell>
                            <div class="flex justify-end">
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
                            </div>
                        </x-table.cell>
                    </x-table.row>
                @endforeach
            </x-slot>
        </x-table>
        @if( $rsu->hasPages() )
            <div class="py-3">
                {{ $rsu->links() }}
            </div>
        @endif
    @else
        <x-empty-search></x-empty-search>
    @endif
</div>
