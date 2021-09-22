<x-app-layout>
    {{--    <div class="bg-yellow-300 text-yellow-900 text-xs">--}}
    {{--        {{ $estudiantes->bachilleres }}--}}
    {{--    </div>--}}
    {{--    <div class="bg-indigo-300 text-indigo-900">--}}
    {{--        --}}{{--        {{ $bachilleres->gradoReciente }}--}}
    {{--    </div>--}}


    <x-card class="py-4">

        <div class="flex justify-between items-center mb-6">
            <x-input-dropdown></x-input-dropdown>
            <x-input-search></x-input-search>
        </div>

        <x-table>

            <x-slot name="total">
                {{ $estudiantes->bachilleres->count() }}
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
                    Bachiller
                </x-table.heading>
                <x-table.heading>
                    Grado Actual
                </x-table.heading>
                <x-table.heading>
                    <span class="hidden">Acciones</span>
                </x-table.heading>
            </x-slot>
            <x-slot name="body">
                @foreach($estudiantes->bachilleres as $bachiller)
                    <x-table.row :odd="$loop->odd">
                        <x-table.cell>
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    @if($bachiller->solicitud and $bachiller->solicitud->foto and $bachiller->solicitud->foto->documento)
                                        <img class="h-10 w-10 rounded-full"
                                             src="{{ asset('storage/'.$bachiller->solicitud->foto->documento->enlace_interno) }}"
                                             alt="{{ $bachiller->id }}">
                                    @else
                                        <img class="h-10 w-10 rounded-full"
                                             src="{{ asset('images/male_profile.jpg') }}"
                                             alt="{{ $bachiller->id }}">
                                    @endif


                                </div>
                                <div class="ml-4">
                                    <div class="font-medium text-gray-900 whitespace-nowrap">
                                        {{ $bachiller->persona->apellidos}}
                                    </div>
                                    <div class="text-gray-500 whitespace-nowrap">
                                        {{ $bachiller->persona->nombres }}
                                    </div>
                                </div>
                            </div>
                        </x-table.cell>
                        <x-table.cell>
                            <div class="group-hover:text-gray-900 whitespace-nowrap">
                                {{ $bachiller->codigo }}
                            </div>
                        </x-table.cell>
                        <x-table.cell>
                            <div class="group-hover:text-gray-900 whitespace-nowrap">
                                {{ $bachiller->escuela->nombre }}
                            </div>
                        </x-table.cell>
                        <x-table.cell>
                            {{ $bachiller->pivot->created_at->diffForHumans() }}
                        </x-table.cell>
                        <x-table.cell>
                            {{ $bachiller->gradoReciente->grado->nombre }}
                        </x-table.cell>
                        <x-table.cell>
                            <a href="{{ route('bachiller.constancia', [sha1($bachiller->id)]) }}"
                               target="_blank"
                               class="text-indigo-600 hover:text-indigo-900">Constancia</a>
                        </x-table.cell>
                    </x-table.row>
                @endforeach
            </x-slot>
        </x-table>
    </x-card>

</x-app-layout>
