<div class="mt-8 mb-4">

    <div class="my-6">
        <x-simple-progress percent="{{ $completos / $incompletos * 100 }}">
            Actividades completadas
        </x-simple-progress>
    </div>

    @if($actividades->count())
        <x-table>
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50 rounded-lg">
                <tr>
                    <th scope="col"
                        class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Actividad
                    </th>
                    <th scope="col"
                        class="px-1 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Estado
                    </th>
                    <th scope="col" class="relative px-4 py-3">
                        <span class="sr-only">Completar</span>
                    </th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @foreach($actividades as $actividad)
                    <tr>
                        <td class="px-4 py-4 text-sm whitespace-nowrap">
                            <div class="text-gray-800">
                                {{ $actividad->actividad }}
                            </div>
                            <span class="text-gray-400">
                            {{ $actividad->proceso }}
                        </span>
                        </td>
                        <td class="px-1 py-4 whitespace-nowrap">
                            @if($actividad->estado === 1)
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                          {{ __('Completado') }}
                        </span>
                            @else
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-rose-100 text-rose-800">
                          {{ __('Sin completar') }}
                        </span>
                            @endif
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="{{ $actividad->id }}"
                               class="bg-transparent px-2 rounded text-gray-600 hover:bg-blue-50 hover:text-blue-700">
                                Revisar
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </x-table>
    @else

        <div class="mt-6 w-full flex justify-center">
            <div class="w-6/12">
                <img src="{{ asset('images/completed.svg') }}" alt="Actividades Completados" class="opacity-75">
                <div class="w-full text-center text-gray-600 mt-4 text-xl leading-5">
                    Ya completó todas las actividades
                </div>
            </div>
        </div>
    @endif
</div>
