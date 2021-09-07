<x-app-layout>

    <div class="p-4 bg-white mb-8 flex items-center gap-x-4">

        {{--        <input type="text"--}}
        {{--               class="focus:ring-0 rounded shadow-md border-0 border-b-2 border-gray-300 focus:border-blue-600">--}}

        {{--        <input type="text"--}}
        {{--               class="focus:ring-0 rounded shadow-lg border-0 border-b-2 border-gray-300 focus:border-blue-600">--}}


        <div
            class="rounded shadow-lg  inline-flex gap-x-2 items-center px-4 text-gray-600 hover:text-gray-800 border-b-2 border-gray-300 focus:border-blue-600 transition duration-500">
            @php
                $id = "id_" . rand(0, 1584);
            @endphp
            <label for="{{ $id }}" class="inline-flex items-center">
                <x-icons.people :stroke="1.5" class="h-8 w-8"></x-icons.people>
                Persona
            </label>
            <input id="{{ $id }}" type="text"
                   class="focus:ring-0 border-0">
        </div>


        <div class="p-4 max-w-xs mx-auto bg-white rounded-xl shadow-md">
            <label class="flex items-center space-x-3">
                <input type="checkbox" name="checked-demo" value="1"
                       class="focus:ring-0 form-tick appearance-none h-6 w-6 border border-gray-300 rounded-md checked:bg-blue-600 checked:border-transparent focus:outline-none">
                <span class="text-gray-900 font-medium">Option 1</span>
            </label>
        </div>


    </div>


    <div class="grid grid-cols-3 gap-x-4 gap-y-6">
        @foreach( $procesos as $proceso )
            @if($proceso->indicadores_count)
                <x-card
                    class="col-span-3 lg:col-span-1 group hover:shadow-lg hover:border-indigo-700 transition duration-500">
                    <a class="text-lg font-bold text-gray-600 group-hover:text-indigo-700 transition duration-500"
                       href="{{ route('indicadores.indicadores', [$proceso->id, str_replace(' ', '_', $proceso->nombre)]) }}">
                        Proceso de {{ $proceso->nombre }}
                    </a>

                    <div class="flex items-center justify-between pt-4">
                        <p class="text-gray-600 text-sm">
                            {{ $proceso->indicadores_count }} indicadores
                        </p>
                        <a href="{{ route('indicadores.indicadores', [$proceso->id, str_replace(' ', '_', $proceso->nombre)]) }}"
                           class="flex bg-gray-100 group-hover:bg-indigo-700 group-hover:shadow px-3 py-1 rounded text-sm text-gray-700 group-hover:text-white transition duration-500">
                            <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                      d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                            </svg>
                            Revisar
                        </a>
                    </div>

                </x-card>
            @endif
        @endforeach
    </div>

</x-app-layout>
