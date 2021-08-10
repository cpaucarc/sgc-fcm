<x-app-layout>

    <div class="space-y-4">
        {{--    Cabecera: Datos generales del indicador--}}
        <x-card>
            <div class="flex justify-between items-start">
                <div class="flex-1">
                    <h1 class="text-gray-800 font-bold text-xl">
                        {{ $indicador->objetivo }}
                    </h1>
                    <h2 class="text-gray-500 font-bold">
                        <span class="text-gray-500 mr-1 font-normal">Proceso al que pertenece:</span>
                        {{ $indicador->proceso->nombre }}
                    </h2>
                    @if($indicador->escuela_id)
                        <h2 class="text-gray-500 font-bold">
                            <span class="text-gray-500 mr-1 font-normal">Programa de estudios:</span>
                            {{ $indicador->escuela->nombre }}
                        </h2>
                    @endif
                </div>
                <div class="text-gray-700 text-xs space-y-2 font-bold">
                    <h3 class="px-4 py-2 bg-gray-200">
                        <span class="text-gray-500 mr-1 font-normal">CÓDIGO IND. INICIAL:</span>
                        {{ $indicador->cod_ind_inicial }}
                    </h3>
                    <h3 class="px-4 py-2 bg-gray-200">
                        <span class="text-gray-500 mr-1 font-normal">CÓDIGO IND. FINAL:</span>
                        {{ $indicador->cod_ind_final }}
                    </h3>
                </div>
            </div>
        </x-card>


        <x-card>

            {{--    Contador y creacion de nueva instancia--}}
            <div class="flex justify-between items-center mb-6">

                <div>
                    <h3 class="ml-1 text-gray-600 font-bold text-lg">
                        Hay
                        <span class="text-gray-800">
                            {{ $indicador->analisis->count() }}
                        </span>
                        instancias de este indicador
                    </h3>
                </div>

                <x-jet-button>
                    <svg class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                    Crear nuevo
                </x-jet-button>

            </div>

            {{--    Tabla historica--}}
            <x-table>
                <x-slot name="head">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Name
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Title
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Role
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </x-slot>

                <x-slot name="body">
                    @foreach($indicador->analisis as $i => $analisis)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-full"
                                             src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60"
                                             alt="">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            Jane Cooper
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            jane.cooper@example.com
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">Regional Paradigm Technician</div>
                                <div class="text-sm text-gray-500">Optimization</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                  Active
                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                Admin
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </x-slot>
            </x-table>

        </x-card>


    </div>


</x-app-layout>
