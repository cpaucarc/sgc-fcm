<div class="grid grid-cols-2 gap-6 items-start">
    <x-card>

        <x-slot name="header">
            <div class="flex justify-between items-center">
                <h2 class="font-bold text-lg text-gray-700">
                    Solicitudes con documentos completos
                </h2>
                <span class="px-4 py-1.5 bg-gray-200 rounded-lg text-gray-800">
                    {{ $solicitudesCompletas->count() }} solicitudes
                </span>
            </div>
        </x-slot>

        <div class="space-y-6">
            @forelse( $solicitudesCompletas as $solc)
                <div class="group rounded-lg px-5 py-4 flex items-center justify-between border">
                    <div>
                        <h2 class="text-gray-500 group-hover:text-indigo-800 font-semibold">
                            {{ $solc->estudiante->persona->apellidos . ' '. $solc->estudiante->persona->nombres }}
                        </h2>
                        <h3 class="text-gray-400 group-hover:text-gray-500 text-sm">
                            DNI: {{ $solc->estudiante->persona->dni }}
                        </h3>
                    </div>
                    <div>
                        <x-button.invisible color="indigo"
                                            wire:click="mostrarModal({{ $solc->id }}, '{{ $solc->estudiante->persona->apellidos . ' '. $solc->estudiante->persona->nombres }}',{{$solc->estudiante->escuela_id}}, true)">
                            Revisar
                        </x-button.invisible>
                    </div>
                </div>
            @empty
                <x-message-image>
                    <x-slot name="title">No hay ninguna solicitud</x-slot>
                    <x-slot name="description">
                        Actualmente no hay ninguna solicitud que tenga todos los documentos completos.
                    </x-slot>
                    <x-slot name="image">{{ asset('images/ilustraciones/solicitudes_completas.svg') }}</x-slot>
                </x-message-image>

            @endforelse
        </div>
    </x-card>

    <x-card>

        <x-slot name="header">
            <div class="flex justify-between items-center">
                <h2 class="font-bold text-lg text-gray-700">
                    Solicitudes con documentos incompletos
                </h2>
                <span class="px-4 py-1.5 bg-gray-200 rounded-lg text-gray-800">
                    {{ $solicitudesIncompletas->count() }} solicitudes
                </span>
            </div>
        </x-slot>

        <div class="space-y-6">
            @forelse( $solicitudesIncompletas as $soli)
                <div class="group rounded-lg px-5 py-4 flex items-center justify-between border">
                    <div>
                        <h2 class="text-gray-500 group-hover:text-yellow-800 font-semibold">
                            {{ $soli->estudiante->persona->apellidos . ' '. $soli->estudiante->persona->nombres }}
                        </h2>
                        <h3 class="text-gray-400 group-hover:text-gray-500 text-sm">
                            {{ $soli->documentos_count }} de 4 documentos enviados
                        </h3>
                    </div>

                    <div>
                        <x-button.invisible color="yellow"
                                            wire:click="mostrarModal({{ $soli->id }}, '{{ $soli->estudiante->persona->apellidos . ' '. $soli->estudiante->persona->nombres }}', false)">
                            Revisar
                        </x-button.invisible>
                    </div>
                </div>
            @empty
                <x-message-image>
                    <x-slot name="title">No hay ninguna solicitud</x-slot>
                    <x-slot name="description">
                        Actualmente no hay ninguna solicitud.
                    </x-slot>
                    <x-slot name="image">{{ asset('images/ilustraciones/solicitudes_completas.svg') }}</x-slot>
                </x-message-image>

            @endforelse
        </div>
    </x-card>


    @if($solicitudSeleccionado)
        <x-jet-dialog-modal wire:model="abrirCompleto">
            <x-slot name="title">
                <div class="flex items-center justify-between w-full mb-2">
                    <h1 class="text-gray-600">
                        Solicitud presentado por <span class="font-bold">{{ $solicitante }}</span>
                    </h1>
                    <x-button.invisible wire:click="$set('abrirCompleto', false)">
                        <x-icons.x class="h-4 w-4"></x-icons.x>
                    </x-button.invisible>
                </div>
            </x-slot>
            <x-slot name="content">
                @if(!$requisitosCompleto)
                    <div class="w-full grid place-items-center -mt-8 mb-4">
                        <p class="inline-flex items-center bg-yellow-200 rounded-lg text-yellow-700 text-sm font-semibold px-4 py-1.5">
                            <x-icons.warning class="h-5 w-5 text-yellow-700 mr-2"></x-icons.warning>
                            El solicitante aún no hay enviado todos los requisitos.
                        </p>
                    </div>
                @endif

                @if($requisitosCompleto)
                    <div class="flex justify-around items-center mb-4">
                        <x-button.soft color="red" wire:click="denegar">
                            <x-icons.x class="h-5 w-5 mr-1"></x-icons.x>
                            Denegar solicitud
                        </x-button.soft>
                        <x-button.soft color="lime" wire:click="aprobar">
                            <x-icons.check class="h-5 w-5 mr-1"></x-icons.check>
                            Aprobar solicitud
                        </x-button.soft>
                    </div>
                @endif
                <h3 class="text-gray-800 text-sm text-center mb-2">
                    Documentos presentados
                </h3>

                <x-table>
                    <x-slot name="body">
                        @foreach($solicitudSeleccionado->documentos as $i => $doc)
                            <x-table.row :odd="$loop->odd">
                                <x-table.cell>
                                    {{ ($i+1) }}
                                </x-table.cell>
                                <x-table.cell>
                                    {{ $doc->requisito->nombre }}
                                </x-table.cell>
                                <x-table.cell>
                                    {{ $doc->created_at->format('d M Y') }}
                                </x-table.cell>
                                <x-table.cell>
                                    <div class="flex justify-end items-center text-sm">
                                        <x-button.invisible-link color="indigo" size="sm" target="_blank"
                                                                 href="{{ route('documentos', $doc->documento->enlace_interno) }}">
                                            <x-icons.documents :stroke="1.5" class="h-5 w-5 mr-1"></x-icons.documents>
                                            Ver
                                        </x-button.invisible-link>
                                    </div>
                                </x-table.cell>
                            </x-table.row>
                        @endforeach
                    </x-slot>
                </x-table>
            </x-slot>
        </x-jet-dialog-modal>
    @endif
</div>
