<div>
    <div class="flex justify-between items-center mb-6">
        <x-input-dropdown wire:model="cantidad"></x-input-dropdown>
        <x-input-search wire:model="query"></x-input-search>
    </div>
    @if ($convalidaciones->count())
        <x-table>

            <x-slot name="total">
                {{ $convalidaciones->total() }}
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
                    Convalidación
                </x-table.heading>
                <x-table.heading>
                    <span class="hidden">Acciones</span>
                </x-table.heading>
            </x-slot>
            <x-slot name="body">
                @foreach ($convalidaciones as $convalidacion)
                    <x-table.row :odd="$loop->odd">
                        <x-table.cell>
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    @if ($convalidacion->estudiante->solicitud and $convalidacion->estudiante->solicitud->foto and $convalidacion->estudiante->solicitud->foto->documento)
                                        <img class="h-10 w-10 rounded-full"
                                            src="{{ asset('storage/' . $convalidacion->estudiante->solicitud->foto->documento->enlace_interno) }}"
                                            alt="{{ $convalidacion->estudiante->id }}">
                                    @else
                                        <img class="h-10 w-10 rounded-full"
                                            src="{{ asset('images/male_profile.jpg') }}"
                                            alt="{{ $convalidacion->estudiante->id }}">
                                    @endif
                                </div>
                                <div class="ml-4">
                                    <div class="font-medium text-gray-900 whitespace-nowrap">
                                        {{ $convalidacion->estudiante->persona->apellidos }}
                                    </div>
                                    <div class="text-gray-500 whitespace-nowrap">
                                        {{ $convalidacion->estudiante->persona->nombres }}
                                    </div>
                                </div>
                            </div>
                        </x-table.cell>
                        <x-table.cell>
                            <div class="group-hover:text-gray-900 whitespace-nowrap">
                                {{ $convalidacion->estudiante->codigo }}
                            </div>
                        </x-table.cell>
                        <x-table.cell>
                            <div class="group-hover:text-gray-900 whitespace-nowrap">
                                {{ $convalidacion->estudiante->escuela->nombre }}
                            </div>
                        </x-table.cell>
                        <x-table.cell>
                            {{ $convalidacion->created_at->diffForHumans() }}
                        </x-table.cell>
                        <x-table.cell>
                            <div class="text-xs flex items-center justify-end space-x-2">
                                <x-button.invisible-link target="_blank"
                                    href="#">
                                    <x-icons.documents :stroke="1.5" class="h-5 w-5"></x-icons.documents>
                                </x-button.invisible-link>
                            </div>
                        </x-table.cell>
                    </x-table.row>
                @endforeach
            </x-slot>
        </x-table>

        @if ($convalidaciones->hasPages())
            <div class="py-3">
                {{ $convalidaciones->links() }}
            </div>
        @endif
    @else
        <x-empty-search></x-empty-search>
    @endif
</div>
