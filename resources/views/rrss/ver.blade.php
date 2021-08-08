<x-app-layout>
    <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-6 lg:w-9/12 mx-auto">
        <div class="px-4 py-5 sm:px-6">
            <h3 class="text-xl font-bold leading-6 font-medium text-gray-900">
                Responsabilidad Social
            </h3>
            <p class="mt-1 max-w-2xl text-gray-500">
                Vista detalle
            </p>
        </div>
        <div class="border-t border-gray-200">
            <dl>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="font-medium text-gray-500">
                        Titulo
                    </dt>
                    <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $responsabilidad_social->titulo  }}
                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="font-medium text-gray-500">
                        Descripcion
                    </dt>
                    <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                        @if($responsabilidad_social->descripcion)
                            {{ $responsabilidad_social->descripcion }}
                        @else
                            {{ __('No se proporcionó una descripción') }}
                        @endif
                    </dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="font-medium text-gray-500">
                        Lugar
                    </dt>
                    <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $responsabilidad_social->lugar  }}
                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="font-medium text-gray-500">
                        Ciclo
                    </dt>
                    <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $responsabilidad_social->ciclo->nombre  }}
                    </dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="font-medium text-gray-500">
                        Fechas de la Responsabilidad Social
                    </dt>
                    <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                        <span
                            class="block">Fecha de Inicio: {{ $responsabilidad_social->fecha_inicio->format('l, jS F Y')  }}</span>
                        <span
                            class="block">Fecha de Finalizacion: {{ $responsabilidad_social->fecha_fin->format('l, jS F Y')  }}</span>

                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="font-medium text-gray-500">
                        Escuela
                    </dt>
                    <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $responsabilidad_social->escuela->nombre }}
                        - {{ $responsabilidad_social->escuela->facultad->nombre }}
                    </dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="font-medium text-gray-500">
                        Empresa
                    </dt>
                    <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                        @if($responsabilidad_social->empresa)
                            {{ $responsabilidad_social->empresa->nombre }}
                        @else
                            {{ __('No se aplicó a una empresa') }}
                        @endif
                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="font-medium text-gray-500">
                        Responsable(s)
                    </dt>
                    <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                        @if($responsabilidad_social->docente_responsable_id)
                            <span class="block">
                                Docente:
                                {{$responsabilidad_social->docente->persona->apellidos}}
                                {{$responsabilidad_social->docente->persona->nombres}}
                                <span class="text-gray-600 ml-2">
                                    [ Cod. {{$responsabilidad_social->docente->codigo}}]
                                </span>
                            </span>
                        @endif

                        @if($responsabilidad_social->estudiante_responsable_id)
                            <span class="block">
                                Estudiante:
                                {{$responsabilidad_social->estudiante->persona->apellidos}}
                                {{$responsabilidad_social->estudiante->persona->nombres}}
                                <span class="text-gray-600 ml-2">
                                    [ Cod. {{$responsabilidad_social->estudiante->codigo}}]
                                </span>
                            </span>
                        @endif

                    </dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="font-medium text-gray-500">
                        Estado
                    </dt>
                    <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                        @if( $responsabilidad_social->fecha_fin > now())
                            <span
                                class="px-3 py-1 inline-flex leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                              Falta {{ $responsabilidad_social->fecha_fin->diffForHumans() }}
                            </span>
                        @else
                            <span
                                class="px-3 py-1 inline-flex leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                              Terminado {{ $responsabilidad_social->fecha_fin->diffForHumans() }}
                            </span>
                        @endif
                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="font-medium text-gray-500">
                        Participantes
                    </dt>
                    <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                        <div x-data="{ ver: false}">
                            <h1>
                                {{ $responsabilidad_social->participantes_docentes->count() }} docentes
                                @if($responsabilidad_social->participantes_estudiantes->count())
                                    <span @click="ver = !ver"
                                          class="ml-4 text-gray-500 hover:text-blue-600 hover:underline cursor-pointer">
                                    Ver docentes
                                </span>
                                @endif
                            </h1>
                            <div x-show="ver" @click.away="ver = false" class="ml-6 my-2 text-gray-600"
                                 x-transition:enter.duration.500ms x-transition:leave.duration.400ms>
                                <h2>Lista de Docentes</h2>
                                <table class="table-auto text-xs md:text-sm">
                                    <tbody>
                                    @foreach($responsabilidad_social->participantes_docentes as $i => $pdoc)
                                        <tr>
                                            <td class="pr-4 py-1">{{($i+1)}}</td>
                                            <td class="px-4 py-1">{{$pdoc->docente->persona->apellidos}} {{$pdoc->docente->persona->nombres}}</td>
                                            <td class="px-4 py-1">Cod. {{$pdoc->docente->codigo}}</td>
                                            <td class="pl-4 py-1"> Se unio
                                                el {{$pdoc->fecha_incorporacion->isoFormat('DD-MM-Y')}}</td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div x-data="{ ver: false}">
                            <h1>
                                {{ $responsabilidad_social->participantes_estudiantes->count() }} estudiantes
                                @if($responsabilidad_social->participantes_estudiantes->count())
                                    <span @click="ver = !ver"
                                          class="ml-4 text-gray-500 hover:text-blue-600 hover:underline cursor-pointer">
                                    Ver estudiantes
                                </span>
                                @endif
                            </h1>
                            <div x-show="ver" @click.away="ver = false" class="ml-6 my-2 text-gray-600"
                                 x-transition:enter.duration.500ms x-transition:leave.duration.400ms>
                                <h2>Lista de Estudiantes</h2>
                                <table class="table-auto text-xs md:text-sm">
                                    <tbody>
                                    @foreach($responsabilidad_social->participantes_estudiantes as $i => $pest)
                                        <tr>
                                            <td class="pr-4 py-1">{{($i+1)}}</td>
                                            <td class="px-4 py-1">{{$pest->estudiante->persona->apellidos}} {{$pest->estudiante->persona->nombres}}</td>
                                            <td class="px-4 py-1">Cod. {{$pest->estudiante->codigo}}</td>
                                            <td class="pl-4 py-1"> Se unio
                                                el {{$pest->fecha_incorporacion->isoFormat('DD-MM-Y')}}</td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="font-medium text-gray-500">
                        Documentos {{ $responsabilidad_social->documentos->count() }}
                    </dt>
                    <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                        @if($responsabilidad_social->documentos->count())
                            <ul class="border border-gray-200 rounded-md divide-y divide-gray-200">
                                @foreach($responsabilidad_social->documentos as $docrrss)
                                    <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                        <div class="w-0 flex-1 flex items-center">
                                            <svg class="flex-shrink-0 h-5 w-5 text-gray-400" fill="none"
                                                 viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                      d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                            </svg>
                                            <span class="ml-2 flex-1 w-0 truncate">
                                                <a href="{{ route('documentos', $docrrss->documento->enlace_interno) }}"
                                                   class="font-medium text-gray-600 hover:text-blue-700 hover:underline"
                                                   target="_blank">
                                                    {{$docrrss->documento->nombre}}
                                                </a>
                                            </span>
                                        </div>
                                        <div class="ml-4 flex-shrink-0 text-gray-600">
                                            Enviado {{ $docrrss->documento->created_at->diffForHumans() }}
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p>Aun no hay documentos asociados a esta responsabilidad social</p>
                        @endif
                    </dd>
                </div>
            </dl>
        </div>
    </div>
</x-app-layout>
