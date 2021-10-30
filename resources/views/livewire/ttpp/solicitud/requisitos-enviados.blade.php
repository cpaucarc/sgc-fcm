<div>
    @if($estudiante->solicitudTitulo)
        @if($estudiante->solicitudTitulo->documentos->count())

            <x-table>
                <x-slot name="head">
                    <x-table.heading>N°</x-table.heading>
                    <x-table.heading>Requisito</x-table.heading>
                    <x-table.heading>Enviado el</x-table.heading>
                    <x-table.heading class="text-right">
                        <span class="hidden">Acciones</span>
                    </x-table.heading>
                </x-slot>
                <x-slot name="body">
                    @foreach($estudiante->solicitudTitulo->documentos as $i => $doc)
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
                                    <x-button.invisible-link color="blue" size="sm" target="_blank"
                                                             href="{{ route('documentos', $doc->documento->enlace_interno) }}">
                                        <x-icons.documents :stroke="1.5" class="h-5 w-5 mr-1"></x-icons.documents>
                                        Ver
                                    </x-button.invisible-link>
                                    <x-button.invisible color="red" size="sm"
                                                        wire:click="borrarDocumento({{ $doc->id }}, {{ $doc->documento->id }}, '{{ $doc->documento->nombre }}', '{{ $doc->requisito->nombre }}')">
                                        <x-icons.delete :stroke="1.5" class="h-5 w-5 mr-1"></x-icons.delete>
                                        Eliminar
                                    </x-button.invisible>

                                </div>

                            </x-table.cell>
                        </x-table.row>
                    @endforeach
                </x-slot>
            </x-table>
        @else
            <x-message-image>
                <x-slot name="title">Aún no has enviado ningun documento</x-slot>
                <x-slot name="description">
                    La solicitud se generará automaticamente cuando envies el primer documento
                </x-slot>
                <x-slot name="image">{{ asset('images/ilustraciones/enviar_documento.svg') }}</x-slot>
            </x-message-image>
        @endif
    @else
        <div class="grid place-items-center">

            <div class="flex gap-x-6 items-center">
                <div class="w-52">
                    <h2 class="font-bold text-xl text-gray-800 leading-5">
                        Aún no has enviado ningun documento
                    </h2>
                    <h3 class="text-gray-600  mt-4">
                        La solicitud se generará automaticamente cuando envies el primer documento
                    </h3>
                </div>
                <img class="w-48"
                     src="{{ asset('images/ilustraciones/enviar_documento.svg') }}"
                     alt="Ilustracion de persona enviando un documento">


            </div>
        </div>

    @endif


    <x-jet-confirmation-modal wire:model="abrir">
        <x-slot name="title">
            ¿Quiere eliminar el documento enviado?
        </x-slot>
        <x-slot name="content">
            <p>
                El documento llamado
                <span class="italic font-semibold">{{ $nombreDocumento }}</span>, perteneciente al requisito
                <span class="italic font-semibold">{{ $nombreRequisito }}</span> será eliminado definitivamente.
                <br>
                ¿Quiere continuar?
            </p>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('abrir', false)">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click="borrarDefinitivamente">
                Eliminar
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>

</div>
