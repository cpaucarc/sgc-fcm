<div class="space-y-4">
    <x-card>
        <x-slot name="header">
            <h1 class="font-bold text-gray-800 text-lg">
                Agregar participantes a la responsabilidad social
                <span class="text-blue-900 italic">
                    "{{$rrss->titulo}}"
                </span>
            </h1>
        </x-slot>

        <h1 class="font-bold text-gray-500 mb-2">Responsable(s)</h1>
        <div class="flex items-center gap-x-4">
            @if($rrss->docente)
                <div class="px-4 py-2 text-blue-800 bg-blue-100 rounded-md flex-1">
                    Docente: {{$rrss->docente->persona->apellidos}} {{$rrss->docente->persona->nombres}}
                </div>
            @endif
            @if($rrss->estudiante)
                <div
                    class="px-4 py-2 text-yellow-800 bg-yellow-100 rounded-md flex-1">
                    Estudiante: {{$rrss->estudiante->persona->apellidos}} {{$rrss->estudiante->persona->nombres}}
                </div>
            @endif
        </div>

    </x-card>

    <div>
        <div class="lg:grid lg:grid-cols-2 lg:gap-4">
            <div class="lg:col-span-1">
                @livewire('rrss.registro.agregar-docente-participante', ['id' => $rrss->id])
            </div>
            <div class="mt-5 lg:mt-0 lg:col-span-1">
                @livewire('rrss.registro.agregar-estudiante-participante', ['id' => $rrss->id])
            </div>
        </div>
    </div>

    <x-card>
        <div class="flex items-center justify-end text-gray-700 space-x-4">
            <a href="{{ route('rrss.registro') }}" class="px-3 py-1.5 bg-transparent hover:bg-gray-200 rounded">
                Registrar otro
            </a>
            <a href="{{ route('rrss.index', $rrss->id) }}" class="px-3 py-1.5 bg-transparent hover:bg-gray-200 rounded">
                Ver esta RRSS
            </a>
            <a href="{{ route('rrss.index') }}" class="px-3 py-1.5 bg-blue-600 hover:bg-blue-700 rounded text-white">
                Finalizar y ver la lista de RRSS
            </a>
        </div>

    </x-card>

</div>