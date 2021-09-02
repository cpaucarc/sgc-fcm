<x-card>

    <div class="flex justify-between items-center mt-4 mb-8">
        <x-input-dropdown wire:model="cantidad"/>

        <div class="inline-flex">
            <div class="bg-gray-50 px-2 py-1 rounded-lg mr-4">
                <select wire:model="escuela"
                        class="input-form-none text-gray-800 font-semibold cursor-pointer bg-transparent">
                    @forelse($escuelas as $escuela)
                        <option value="{{ $escuela->id }}">{{ $escuela->nombre }}</option>
                    @empty
                        <option value="0">No se encontró ninguna escuela</option>
                    @endforelse
                </select>
            </div>

            <div class="bg-gray-50 px-2 py-1 rounded-lg ">
                <select wire:model="tipo"
                        class="input-form-none text-gray-800 font-semibold cursor-pointer bg-transparent">
                    <option value="1">Docentes</option>
                    <option value="2">Estudiantes</option>
                </select>
            </div>
        </div>

        <x-input-search wire:model.debounce.500ms="buscar"/>
    </div>

    <x-items-matched total="{{$investigadores->total()}}"/>

    <div class="grid grid-cols-4 gap-x-6 gap-y-8">
        @foreach($investigadores as $inv)
            <div class="col-span-5 md:col-span-2 lg:col-span-1">
                <figure
                    class="rounded-lg border border-gray-300 bg-gray-50 flex md:flex-col gap-x-12 py-0 md:py-4 lg:py-0 overflow-hidden">

                    <div class="overflow-hidden">
                        <img
                            class="w-32 h-full md:h-48 md:w-48 lg:w-full lg:h-56 mx-auto object-cover bg-center rounded-none md:rounded-full lg:rounded-none"
                            src="{{ asset($inv->foto) }}"
                            alt="">
                    </div>

                    <figcaption class="font-medium px-2 py-4">
                        <div class="text-left md:text-center">
                            <div class="text-gray-900 flex md:flex-col gap-x-1">
                                @if($inv->docente)
                                    <h2 class="uppercase font-bold">
                                        {{ $inv->docente->persona->apellidos }}
                                    </h2>
                                    <h3 class="font-thin">
                                        {{ $inv->docente->persona->nombres }}
                                    </h3>
                                @else
                                    <h2 class="uppercase font-bold">
                                        {{ $inv->estudiante->persona->apellidos }}
                                    </h2>
                                    <h3 class="font-thin">
                                        {{ $inv->estudiante->persona->nombres }}
                                    </h3>
                                @endif
                            </div>
                            <div class="text-gray-600  text-sm">
                                <h4 class="mb-4">
                                    @if($inv->docente)
                                        {{ $inv->docente->escuela->nombre }}
                                    @else
                                        {{ $inv->estudiante->escuela->nombre }}
                                    @endif
                                </h4>

                                <h3>
                                    Grado: <span class="font-light">{{ $inv->grado->nombre }}</span>
                                </h3>
                                <h3>
                                    Categoría: <span class="font-light">{{ $inv->categoria->nombre }}</span>
                                </h3>

                            </div>
                        </div>

                        <div class="flex justify-between items-center mt-6 mx-2">
                            <div class="flex gap-x-1.5">
                                <a target="_blank" href="mailto:{{ $inv->correo }}"
                                   class="w-6 h-6 rounded-full bg-gray-300 hover:bg-blue-600 text-gray-700 hover:text-white flex items-center justify-center">
                                    <svg class="h-4 w-4 " fill="none" viewBox="0 0 24 24"
                                         stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.25"
                                              d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/>
                                    </svg>
                                </a>
                                @if($inv->sitio_web)
                                    <a target="_blank" href="{{ $inv->sitio_web }}"
                                       class="w-6 h-6 rounded-full bg-gray-300 hover:bg-blue-600 text-gray-700 hover:text-white flex items-center justify-center">
                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.25"
                                                  d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                                        </svg>
                                    </a>
                                @endif
                            </div>

                            <x-button-void wire:click="verInvestigador({{ $inv }})">
                                <span class="text-xs whitespace-nowrap">Ver proyectos</span>
                            </x-button-void>

                        </div>

                    </figcaption>


                </figure>
            </div>
        @endforeach
    </div>

    <div class="mt-4">
        {{ $investigadores->links() }}
    </div>

    @if($investigador)
        <x-jet-dialog-modal wire:model="mostrar">
            <x-slot name="title">
                <h1 class="font-bold">
                    @if($investigador->docente)
                        {{ $investigador->docente->persona->apellidos }} {{ $investigador->docente->persona->nombres }}
                    @else
                        {{ $investigador->estudiante->persona->apellidos }} {{ $investigador->estudiante->persona->nombres }}
                    @endif
                </h1>
                <button wire:click="$set('mostrar', false)" class="text-gray-400 hover:text-gray-500">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                              d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </x-slot>

            <x-slot name="content">

                <x-table total="{{ $investigador->investigaciones->count() }}">
                    <x-slot name="head">
                        <tr>
                            <x-table.heading>Titulo</x-table.heading>
                            <x-table.heading>Tipo</x-table.heading>
                            <x-table.heading>Estado</x-table.heading>
                            <x-table.heading><span>{{__('')}}</span></x-table.heading>
                        </tr>
                    </x-slot>

                    <x-slot name="body">
                        @foreach($investigador->investigaciones as $investigacion)
                            <tr>
                                <x-table.cell class="text-xs">
                                    {{ $investigacion->titulo }}
                                </x-table.cell>
                                <x-table.cell class="text-xs">
                                    <span>
                                        @if($investigacion->pivot->es_responsable)
                                            {{ __('Responsable') }}
                                        @else
                                            {{ __('Corresponsable') }}
                                        @endif
                                    </span>
                                </x-table.cell>
                                <x-table.cell class="text-xs">
                                    <span
                                        class="whitespace-nowrap rounded-md px-2 py-1 bg-{{$investigacion->estado->color}}-100 text-{{$investigacion->estado->color}}-800">
                                        {{ $investigacion->estado->nombre }}
                                    </span>
                                </x-table.cell>
                                <x-table.cell class="text-xs">
                                    <a href="{{ route('investigacion.mostrar', $investigacion->id) }}"
                                       class="text-gray-500 hover:text-blue-800">
                                        Ver
                                    </a>
                                </x-table.cell>
                            </tr>
                        @endforeach
                    </x-slot>
                </x-table>
            </x-slot>
        </x-jet-dialog-modal>
    @endif

</x-card>
