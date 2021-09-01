<x-app-layout>

    <div class="mx-auto w-full sm:w-10/12 md:w-9/12 lg:w-8/12">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6 flex justify-between items-center">
                <div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Proyectos de Investigación
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        Vista detalle
                    </p>
                </div>
                <span
                    class="px-4 py-2 tracking-wide inline-flex text-sm font-bold rounded-full bg-{{ $investigacion->estado->color }}-100 text-{{ $investigacion->estado->color }}-800">
                  {{ $investigacion->estado->nombre }}
                </span>
            </div>
            <div class="border-t border-gray-200">
                <dl>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Título
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $investigacion->titulo }}
                        </dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Resumen
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            <p class="line-clamp-5">
                                {{ $investigacion->resumen }}
                            </p>
                        </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Responsable
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            <ul>
                                @foreach($investigacion->responsables as $investigador)
                                    @if($investigador->pivot->es_responsable)
                                        <li>
                                            @if($investigador->docente)
                                                {{ $investigador->docente->persona->apellidos }} {{ $investigador->docente->persona->nombres }}
                                            @else
                                                {{ $investigador->estudiante->persona->apellidos }} {{ $investigador->estudiante->persona->nombres }}
                                            @endif
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Corresponsables
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            <ul>
                                @foreach($investigacion->responsables as $investigador)
                                    @if(!$investigador->pivot->es_responsable)
                                        <li>
                                            @if($investigador->docente)
                                                {{ $investigador->docente->persona->apellidos }} {{ $investigador->docente->persona->nombres }}
                                            @else
                                                {{ $investigador->estudiante->persona->apellidos }} {{ $investigador->estudiante->persona->nombres }}
                                            @endif
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Fecha de publicación
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $investigacion->fecha_publicacion->format('d, M Y') }}
                        </dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Escuela
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $investigacion->escuela->nombre }} - {{ $investigacion->escuela->facultad->nombre }}
                        </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Área de investigación
                        </dt>
                        <dd class="mt-1 text-xs text-gray-900 sm:mt-0 sm:col-span-2 space-y-4">
                            <div>
                                <span class="font-semibold mr-1">Sublinea:</span> {{ $investigacion->sublinea->nombre }}
                            </div>
                            <div>
                                <span
                                    class="font-semibold mr-1">Linea:</span> {{ $investigacion->sublinea->linea->nombre }}
                            </div>
                            <div>
                                <span
                                    class="font-semibold mr-1">Área:</span> {{ $investigacion->sublinea->linea->area->nombre }}
                            </div>
                        </dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Presupuesto
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">

                            <table class="w-full">
                                <tbody>
                                @foreach($investigacion->presupuestos as $i => $presupuesto)
                                    <tr class="text-xs lg:text-sm text-gray-500">
                                        <td class="px-2 py-1">
                                            {{ ($i+1) }}
                                        </td>
                                        <td class="px-2 py-1">
                                            {{ $presupuesto->nombre }}
                                        </td>
                                        <td class="px-2 py-1 text-right whitespace-nowrap">
                                            S/. {{ $presupuesto->pivot->presupuesto }}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr class="text-xs lg:text-sm text-gray-700 font-semibold">
                                    <td class="px-2 py-1" colspan="2">
                                        Total
                                    </td>
                                    <td class="px-2 py-1 text-right whitespace-nowrap">
                                        S/. {{ $investigacion->presupuestos->sum('pivot.presupuesto') }}
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>


</x-app-layout>
