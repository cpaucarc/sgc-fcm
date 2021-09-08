<x-app-layout>
    <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-6 lg:w-9/12 mx-auto">
        <div class="px-4 py-5 sm:px-6 flex justify-between items-center">
            <div class="flex-1">
                <h3 class="text-lg lg:text-2xl font-bold leading-6 font-medium text-gray-500">
                    Sustentación de Tesis
                </h3>
                <p class="mt-1 max-w-2xl text-gray-500">
                    Vista detalle
                </p>
            </div>
        </div>
        <div class="border-t border-gray-200">
            <dl>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="font-medium text-gray-500">
                        N° Registro
                    </dt>
                    <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $sustentaciones->tesis->numero_registro }}
                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="font-medium text-gray-500">
                        Tesis
                    </dt>
                    <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $sustentaciones->tesis->titulo }}
                    </dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="font-medium text-gray-500">
                        Declaración
                    </dt>
                    <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                        @if ($sustentaciones->declaracion->nombre === 'Aprobado')
                            <span
                                class="px-3 py-1 inline-flex leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                Aprobado
                            </span>
                        @else
                            <span
                                class="px-3 py-1 inline-flex leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                Desaprobado
                            </span>
                        @endif
                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="font-medium text-gray-500">
                        Asesor
                    </dt>
                    <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $sustentaciones->tesis->asesor->docente->persona->apellidos }}
                        {{ $sustentaciones->tesis->asesor->docente->persona->nombres }}
                        <span class="text-gray-600 ml-2">
                            [ Cod. {{ $sustentaciones->tesis->asesor->docente->codigo }}]
                        </span>
                    </dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="font-medium text-gray-500">
                        Ciclo
                    </dt>
                    <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $sustentaciones->ciclo->nombre }}
                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="font-medium text-gray-500">
                        Escuela
                    </dt>
                    <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $sustentaciones->escuela->nombre }}
                        - {{ $sustentaciones->escuela->facultad->nombre }}
                    </dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="font-medium text-gray-500">
                        Fechas de sustentación
                    </dt>
                    <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                        <span class="block">
                            {{ $sustentaciones->fecha_sustentacion }}</span>
                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="font-medium text-gray-500">
                        Jurados
                    </dt>
                    <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                        <div class="my-2 text-gray-600">
                            <table class="table-auto text-xs md:text-sm">
                                <tbody>
                                    @foreach ($sustentaciones->jurado_sustentacion as $i => $jsus)
                                        <tr>
                                            <td class="pr-4 py-1">{{ $i + 1 }}</td>
                                            <td class="pr-4 py-1">
                                                {{ $jsus->jurado->docente->persona->apellidos }}
                                                {{ $jsus->jurado->docente->persona->nombres }}</td>

                                            <td class="px-4 py-1">Cod. {{ $jsus->jurado->docente->codigo }}</td>
                                            <td class="px-4 py-1">Rol. {{ $jsus->cargo_jurado->nombre }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="font-medium text-gray-500">
                        Tesistas
                    </dt>
                    <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                        <div class="my-2 text-gray-600">
                            <table class="table-auto text-xs md:text-sm">
                                <tbody>
                                    @foreach ($sustentaciones->tesis->bachiller_tesis as $i => $btes)
                                        <tr>
                                            <td class="pr-4 py-1">{{ $i + 1 }}</td>
                                            <td class="pr-4 py-1">
                                                {{ $btes->bachiller->estudiante->persona->apellidos }}
                                                {{ $btes->bachiller->estudiante->persona->nombres }}</td>

                                            <td class="px-4 py-1">Cod.
                                                {{ $btes->bachiller->estudiante->codigo }}
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </dd>
                </div>

                {{-- <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="font-medium text-gray-500">
                        Documentos {{ $sustentaciones->tesis->documento_tesis->count() }}
                    </dt>
                    <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                        @if ($sustentaciones->documento->count())
                            <ul class="border border-gray-200 rounded-md divide-y divide-gray-200">
                                @foreach ($sustentaciones->tesis->documento_tesis as $docst)
                                    <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                        <div class="w-0 flex-1 flex items-center">
                                            <svg class="flex-shrink-0 h-5 w-5 text-gray-400" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                            <span class="ml-2 flex-1 w-0 truncate">
                                                <a href="{{ route('documentos', $docst->documento->enlace_interno) }}"
                                                    class="font-medium text-gray-600 hover:text-blue-700 hover:underline"
                                                    target="_blank">
                                                    {{ $docst->documento->nombre }}
                                                </a>
                                            </span>
                                        </div>
                                        <div class="ml-4 flex-shrink-0 text-gray-600">
                                            Enviado {{ $docst->documento->created_at->diffForHumans() }}
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p>Aun no hay documentos asociados a esta responsabilidad social</p>
                        @endif
                    </dd>
                </div> --}}
            </dl>
        </div>
    </div>
</x-app-layout>
