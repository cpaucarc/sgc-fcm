<div class="space-y-4">
    <x-card>
        <x-slot name="header">
            <h1 class="font-bold text-gray-800 text-lg">
                Agregar participantes a la Sustentación de Tesis
            </h1>
            <span class="text-gray-600">
                [ N° {{ $ttpp->tesis->numero_registro }}]
            </span>
            <span class="text-blue-900 italic">"{{ $ttpp->tesis->titulo }}"</span>

        </x-slot>

        <div class="flex items-center gap-x-4">

            @if ($ttpp->jurado_sustentacion[0]->jurado)
                <div class="p-2 w-full">
                    <h1 class="font-bold text-gray-500 mb-2">Jurados</h1>
                    <div class="px-4 py-2 text-blue-800 bg-blue-100 rounded-md flex-1">
                        Presidente: {{ $ttpp->jurado_sustentacion[0]->jurado->docente->persona->apellidos }}
                        {{ $ttpp->jurado_sustentacion[0]->jurado->docente->persona->nombres }}
                    </div>
                </div>
            @endif

            @if ($ttpp->tesis->bachiller_tesis[0]->bachiller)
                <div class="p-2 w-full">
                    <h1 class="font-bold text-gray-500 mb-2">Bachiller(es)</h1>
                    <div class="px-4 py-2 text-yellow-800 bg-yellow-100 rounded-md flex-1">
                        Bachiller: {{ $ttpp->tesis->bachiller_tesis[0]->bachiller->estudiante->persona->apellidos }}
                        {{ $ttpp->tesis->bachiller_tesis[0]->bachiller->estudiante->persona->nombres }}
                    </div>
                </div>
            @endif
        </div>

    </x-card>

    <div>
        <div class="lg:grid lg:grid-cols-2 lg:gap-4">
            <div class="lg:col-span-1">
                @livewire('ttpp.registro.agregar-docente-jurado', ['id' => $ttpp->id])
            </div>
            <div class="mt-5 lg:mt-0 lg:col-span-1">
                @livewire('ttpp.registro.agregar-estudiante-tesista', ['id' => $ttpp->id])
            </div>
        </div>
    </div>

    <x-card>
        <div class="flex items-center justify-end text-gray-700 space-x-4">
            <a href="{{ route('ttpp.registro') }}" class="px-3 py-1.5 bg-transparent hover:bg-gray-200 rounded">
                Registrar otro
            </a>
            <a href="{{ route('ttpp.index', $ttpp->id) }}"
                class="px-3 py-1.5 bg-transparent hover:bg-gray-200 rounded">
                Ver esta Sustentación
            </a>
            <a href="{{ route('ttpp.index') }}" class="px-3 py-1.5 bg-blue-600 hover:bg-blue-700 rounded text-white">
                Finalizar y ver la lista de sustententaciones
            </a>
        </div>

    </x-card>

</div>
