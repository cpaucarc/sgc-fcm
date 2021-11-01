<div>
    <div class="flex justify-between items-center mb-6">
        <x-input-dropdown wire:model="cantidad"></x-input-dropdown>
        <x-input-search wire:model="query"></x-input-search>
    </div>
    @if ($titulados->count())
        <x-table>
            <x-slot name="total">
                {{ $titulados->total() }}
            </x-slot>

            <x-slot name="head">
                <x-table.heading>
                    Alumno
                </x-table.heading>
                <x-table.heading>
                    Código
                </x-table.heading>
                <x-table.heading>
                    Escuela
                </x-table.heading>
                <x-table.heading>
                    Titulado
                </x-table.heading>
                <x-table.heading>
                    Grado Actual
                </x-table.heading>
                <x-table.heading>
                    <span class="hidden">Acciones</span>
                </x-table.heading>
            </x-slot>
            <x-slot name="body">
                @foreach ($titulados as $titulado)
                    <x-table.row :odd="$loop->odd">
                        <x-table.cell>
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    @if ($titulado->estudiante->solicitud and $titulado->estudiante->solicitud->foto and $titulado->estudiante->solicitud->foto->documento)
                                        <img class="h-10 w-10 rounded-full"
                                            src="{{ asset('storage/' . $titulado->estudiante->solicitud->foto->documento->enlace_interno) }}"
                                            alt="{{ $titulado->estudiante->id }}">
                                    @else
                                        <img class="h-10 w-10 rounded-full"
                                            src="{{ asset('images/male_profile.jpg') }}"
                                            alt="{{ $titulado->estudiante->id }}">
                                    @endif
                                </div>
                                <div class="ml-4">
                                    <div class="font-medium text-gray-900 whitespace-nowrap">
                                        {{ $titulado->estudiante->persona->apellidos }}
                                    </div>
                                    <div class="text-gray-500 whitespace-nowrap">
                                        {{ $titulado->estudiante->persona->nombres }}
                                    </div>
                                </div>
                            </div>
                        </x-table.cell>
                        <x-table.cell>
                            <div class="group-hover:text-gray-900 whitespace-nowrap">
                                {{ $titulado->estudiante->codigo }}
                            </div>
                        </x-table.cell>
                        <x-table.cell>
                            <div class="group-hover:text-gray-900 whitespace-nowrap">
                                {{ $titulado->estudiante->escuela->nombre }}
                            </div>
                        </x-table.cell>
                        <x-table.cell>
                            {{ $titulado->created_at->diffForHumans() }}
                        </x-table.cell>
                        <x-table.cell>
                            <span
                                class="bg-{{ $titulado->estudiante->gradoReciente->grado->color }}-100 text-sm px-4 py-1 rounded-full text-{{ $titulado->estudiante->gradoReciente->grado->color }}-800">
                                {{ $titulado->estudiante->gradoReciente->grado->nombre }}
                            </span>
                        </x-table.cell>
                        <x-table.cell>
                            <div class="text-xs flex items-center justify-end space-x-2">
                                <x-button.invisible-link target="_blank"
                                    href="{{ route('ttpp.estudiante', [sha1($titulado->estudiante_id)]) }}">
                                    <x-icons.person :stroke="1.5" class="h-5 w-5"></x-icons.person>
                                </x-button.invisible-link>
                                <x-button.invisible-link target="_blank"
                                    href="{{ route('ttpp.constancia', [sha1($titulado->estudiante_id)]) }}">
                                    <x-icons.documents :stroke="1.5" class="h-5 w-5"></x-icons.documents>
                                </x-button.invisible-link>
                            </div>
                        </x-table.cell>
                    </x-table.row>
                @endforeach
            </x-slot>
        </x-table>

        @if ($titulados->hasPages())
            <div class="py-3">
                {{ $titulados->links() }}
            </div>
        @endif
    @else
        <x-empty-search></x-empty-search>
    @endif
</div>
