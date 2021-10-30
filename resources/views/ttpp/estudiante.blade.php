<x-app-layout>

    <div class="grid grid-cols-12 flex items-start">
        <x-card class="col-span-3">
            <div class="divide-y divide-gray-200">
                <div class="mb-4">
                    @if($estudiante->solicitud and $estudiante->solicitud->foto and $estudiante->solicitud->foto->documento)
                        <img class="h-32 rounded-lg mx-auto"
                             src="{{ asset('storage/'.$estudiante->solicitud->foto->documento->enlace_interno) }}"
                             alt="{{ $estudiante->id }}">
                    @else
                        <img class="h-32 rounded-lg mx-auto"
                             src="{{ asset('images/male_profile.jpg') }}"
                             alt="{{ $estudiante->id }}">
                    @endif
                    <br>
                    <h2 class="text-xl text-gray-900 font-bold text-center">
                        {{ $estudiante->persona->apellidos }}
                    </h2>
                    <h3 class="text-lg text-gray-600 text-center">
                        {{ $estudiante->persona->nombres }}
                    </h3>
                </div>
                <div class="my-4 pl-6 pr-2">
                    <br>
                    <div class="table w-full">
                        <div class="table-row-group text-gray-800">
                            <div class="table-row py-4">
                                <div class="table-cell text-gray-500">DNI</div>
                                <div class="table-cell font-semibold">{{ $estudiante->persona->dni }}</div>
                            </div>
                            <div class="table-row py-4">
                                <div class="table-cell text-gray-500">Código</div>
                                <div class="table-cell font-semibold">{{ $estudiante->codigo }}</div>
                            </div>
                            <div class="table-row py-4">
                                <div class="table-cell text-gray-500">Escuela</div>
                                <div class="table-cell font-semibold">{{ $estudiante->escuela->nombre }}</div>
                            </div>
                            <div class="table-row py-4">
                                <div class="table-cell text-gray-500">Facultad</div>
                                <div class="table-cell font-semibold">{{ $estudiante->escuela->facultad->abrev }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </x-card>

        <div class="col-span-6">

        </div>

        <div class="col-span-3 space-y-6">
            <x-card>
                <x-slot name="header">
                    <h2 class="font-bold text-gray-800">
                        Grados académicos del estudiante
                    </h2>
                </x-slot>

                <div class="divide-y divide-gray-200">

                    @foreach($estudiante->grados as $grado)
                        <div class="flex justify-between items-center py-2 my-2 px-2
                            {{ $loop->first ? "bg-$grado->color-100 rounded-lg": ''}}">
                            <div class="flex items-center">
                                <div class="h-2 w-2 rounded-full mr-2 bg-{{ $grado->color }}-600"></div>
                                <p class="text-sm text-gray-800">
                                    {{ $grado->nombre }}
                                </p>
                            </div>
                            <p class="text-xs text-gray-600">
                                {{ $grado->pivot->created_at->format('d/m/Y') }}
                            </p>
                        </div>
                    @endforeach

                </div>
            </x-card>
            <x-card>
                <x-slot name="header">
                    <h2 class="font-bold text-gray-800">
                        Constancias
                    </h2>
                </x-slot>

                <div class="text-sm text-gray-800">
                    {{-- Constancia de egresado --}}
                    <div class="group flex justify-between items-center p-2 my-2">
                        <div class="flex items-center">
                            <div class="h-2 w-2 rounded-full mr-2 bg-gray-400 group-hover:bg-orange-500"></div>
                            <p class="">
                                Constancia de Egresado
                            </p>
                        </div>

                        <a href="{{ route('bachiller.constancia', [sha1($estudiante->id)]) }}"
                           target="_blank" class="inline-flex items-center text-gray-400 group-hover:text-gray-900">
                            <x-icons.documents :stroke="1.5" class="h-5 w-5"></x-icons.documents>
                            Ver
                        </a>
                    </div>
                    {{-- Constancia de bachiller --}}
                    <div class="group flex justify-between items-center p-2 my-2">
                        <div class="flex items-center">
                            <div class="h-2 w-2 rounded-full mr-2 bg-gray-400 group-hover:bg-orange-500"></div>
                            <p class="">
                                Constancia de Bachiller
                            </p>
                        </div>

                        <a href="{{ route('bachiller.constancia', [sha1($estudiante->id)]) }}"
                           target="_blank" class="inline-flex items-center text-gray-400 group-hover:text-gray-900">
                            <x-icons.documents :stroke="1.5" class="h-5 w-5"></x-icons.documents>
                            Ver
                        </a>
                    </div>
                    {{-- Constancia de titulado --}}
                    <div class="group flex justify-between items-center p-2 my-2">
                        <div class="flex items-center">
                            <div class="h-2 w-2 rounded-full mr-2 bg-gray-400 group-hover:bg-orange-500"></div>
                            <p class="">
                                Constancia de Título
                            </p>
                        </div>

                        <a href="{{ route('ttpp.constancia', [sha1($estudiante->id)]) }}"
                           target="_blank" class="inline-flex items-center text-gray-400 group-hover:text-gray-900">
                            <x-icons.documents :stroke="1.5" class="h-5 w-5"></x-icons.documents>
                            Ver
                        </a>
                    </div>
                </div>
            </x-card>
        </div>

    </div>

</x-app-layout>
