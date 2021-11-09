<div>
    <div class="flex justify-between items-center mb-6">
        <x-input-dropdown wire:model="cantidad"></x-input-dropdown>
        <select class="input-form" wire:model="escuela_seleccionada">
            @foreach($escuelas as $escuela)
                <option value="{{ $escuela->id }}"> {{ $escuela->nombre }} </option>
            @endforeach
        </select>
        <x-input-search wire:model="query"></x-input-search>
    </div>

    @if($bachilleres->count())
        <x-table total="{{ $bachilleres->total() }}">

            <x-slot name="head">
                <x-table.heading>Alumno</x-table.heading>
                <x-table.heading>Código</x-table.heading>
                <x-table.heading>Escuela</x-table.heading>
                <x-table.heading>Bachiller</x-table.heading>
                <x-table.heading>Grado Actual</x-table.heading>
                <x-table.heading><span class="hidden">Acciones</span></x-table.heading>
            </x-slot>
            <x-slot name="body">
                @foreach($bachilleres as $bachiller)
                    <x-table.row :odd="$loop->odd">
                        <x-table.cell>
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    @if($bachiller->estudiante->solicitud and $bachiller->estudiante->solicitud->foto and $bachiller->estudiante->solicitud->foto->documento)
                                        <img class="h-10 w-10 rounded-full"
                                             src="{{ asset('storage/'.$bachiller->estudiante->solicitud->foto->documento->enlace_interno) }}"
                                             alt="{{ $bachiller->estudiante->id }}">
                                    @else
                                        <img class="h-10 w-10 rounded-full"
                                             src="{{ asset('images/male_profile.jpg') }}"
                                             alt="{{ $bachiller->estudiante->id }}">
                                    @endif
                                </div>
                                <div class="ml-4">
                                    <div class="font-medium text-gray-900 whitespace-nowrap">
                                        {{ $bachiller->estudiante->persona->apellidos}}
                                    </div>
                                    <div class="text-gray-500 whitespace-nowrap">
                                        {{ $bachiller->estudiante->persona->nombres }}
                                    </div>
                                </div>
                            </div>
                        </x-table.cell>
                        <x-table.cell class="whitespace-nowrap">
                            {{ $bachiller->estudiante->codigo }}
                        </x-table.cell>
                        <x-table.cell class="whitespace-nowrap">
                            {{ $bachiller->estudiante->escuela->nombre }}
                        </x-table.cell>
                        <x-table.cell>
                            {{ $bachiller->created_at->diffForHumans() }}
                        </x-table.cell>
                        <x-table.cell>
                            <span
                                class="bg-{{ $bachiller->estudiante->gradoReciente->grado->color }}-100 text-sm px-4 py-1 rounded-full text-{{ $bachiller->estudiante->gradoReciente->grado->color }}-800">
                                {{ $bachiller->estudiante->gradoReciente->grado->nombre }}
                            </span>
                        </x-table.cell>
                        <x-table.cell class="text-right">
                            <x-button.group>
                                <x-button.invisible-link size="sm" color="purple" target="_blank"
                                                         href="{{ route('bachiller.estudiante', [sha1($bachiller->estudiante_id)]) }}">
                                    <x-icons.person :stroke="1.5" class="h-5 w-5"></x-icons.person>
                                </x-button.invisible-link>
                                <x-button.invisible-link size="sm" color="red" target="_blank"
                                                         href="{{ route('bachiller.constancia', [sha1($bachiller->estudiante_id)]) }}">
                                    <x-icons.documents :stroke="1.5" class="h-5 w-5"></x-icons.documents>
                                </x-button.invisible-link>
                            </x-button.group>
                        </x-table.cell>
                    </x-table.row>
                @endforeach
            </x-slot>
        </x-table>

        @if( $bachilleres->hasPages() )
            <div class="py-3">
                {{ $bachilleres->links() }}
            </div>
        @endif
    @else
        <x-empty-search></x-empty-search>
    @endif
</div>

