<x-app-layout>

    {{-- <div class="grid grid-cols-1 gap-y-4 lg:gap-y-0 lg:grid-cols-2 lg:gap-4 ">
        <x-card class="col-span-1">

            @slot('header')
                <h1 class="text-xl font-bold text-gray-800">
                    Actividades Completadas
                </h1>
                <p class="text-sm text-gray-400">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aliquam asperiores, dolorem,
                    impedit, iure iusto magnam maxime nisi non perferendis quam quisquam ratione similique
                    veniam
                    veritatis voluptates voluptatibus? Nostrum, qui!
                </p>
            @endslot

            <x-jet-danger-button>
                <img src="{{ asset('icons/loader.svg') }}" class="h-6 w-6 mr-1 animate-spin" alt="Loader">
                {{ __('Danger') }}
            </x-jet-danger-button>


            <x-slot name="footer">
                <p>
                    Made by magnam maxime nisi non perferendis quam quisquam
                </p>
            </x-slot>
        </x-card>
        <x-card class="col-span-1">

            @slot('header')
                <h1 class="text-xl font-bold text-gray-800">
                    Mis actividades
                </h1>
                <p class="text-sm text-gray-400">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aliquam asperiores, dolorem,
                    impedit, iure iusto magnam maxime nisi non perferendis quam quisquam ratione similique
                    veniam veritatis voluptates voluptatibus? Nostrum, qui!
                </p>
            @endslot

             @livewire('dashboard.actividades-incompletas')


        </x-card>
    </div> --}}

    {{-- Menu principal --}}
    {{-- Bienvenida y fecha actual --}}
    <div class="container mx-auto mb-4 grid">
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4 items-end">
            {{-- Bienvenida --}}
            <div class="col-span-3">
                <h1 class="text-gray-800 text-xl">
                    Bienvenido al Sistema de Gestión de Calidad de Ciencias Medicas
                </h1>
                <div class="rounded-sm p-4 border-2  border-dotted border-gray-300">
                    <p class="text-gray-600" id="userName">
                        {{ Auth::user()->persona->apellidos }} {{ Auth::user()->persona->nombres }}
                    </p>
                </div>
            </div>
            {{-- Fecha actual --}}
            <div class="flex justify-center lg:justify-end">
                <div class="grid grid-cols-5 w-60">
                    <div class="col-span-3 border-2 rounded-tl border-gray-300">
                        <div class="grid grid-cols-3 p-1 text-center">
                            <p class="col-span-3 text-sm text-gray-500">Son las</p>
                            <p id="hour" class="bg-blue-500 rounded text-white mx-1 py-1"></p>
                            <p id="minute" class="bg-blue-500 rounded text-white mx-1 py-1"></p>
                            <p id="second" class="bg-blue-500 rounded text-white mx-1 py-1"></p>
                            <p class="text-sm text-gray-500">h</p>
                            <p class="text-sm text-gray-500">m</p>
                            <p class="text-sm text-gray-500">s</p>
                        </div>
                    </div>
                    <div class=" col-span-2 border-2 rounded-tr border-gray-300 border-l-0 text-center">
                        <p id="weekday" class="text-sm text-gray-500"></p>
                        <p id="day" class="text-4xl font-bold text-blue-500"></p>
                        <p id="month" class="text-sm text-gray-500"></p>
                    </div>
                    <div
                        class="col-span-5 border-2 rounded-b border-gray-300 border-t-0 bg-blue-500 text-white text-center font-semibold text-xl py-1">
                        <p id="year"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Accesos directos --}}
    <div class="container mx-auto my-10 grid p-5 bg-white border border-gray-300 rounded-lg shadow" x-data="{open: true}">
        <div class="w-100 flex items-center">
            <div class="border border-gray-300 p-1 w-7 h-7 mr-2 cursor-pointer hover:bg-gray-100"
                x-on:click="open= !open">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-dash"
                    viewBox="0 0 16 16">
                    <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z" />
                </svg>
            </div>
            <p class="text-base text-gray-500 font-semibold">
                Accesos directos
            </p>
        </div>
        <div class="grid gap-6 mb-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6 p-5" x-show="open">
            {{-- app --}}
            <a href="{{ route('actividad.actividades') }}" class="flex flex-col items-center">

                <div class="flex items-center justify-center p-2 border-2 border-gray-400 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                        <path fill-rule="evenodd"
                            d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="mt-3 text-sm font-medium text-gray-600 font-semibold">
                    Actividades
                </div>
            </a>
            {{-- app --}}
            <a href="{{ route('rrss.index') }}" class="flex flex-col items-center">

                <div class="flex items-center justify-center p-2 border-2 border-gray-400 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400 " viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 100-2 1 1 0 000 2zm7-1a1 1 0 11-2 0 1 1 0 012 0zm-.464 5.535a1 1 0 10-1.415-1.414 3 3 0 01-4.242 0 1 1 0 00-1.415 1.414 5 5 0 007.072 0z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="mt-3 text-sm font-medium text-gray-600 font-semibold">
                    Responsabilidad Social
                </div>
            </a>
            
            {{-- app --}}
            <a href="#" class="flex flex-col items-center">

                <div class="flex items-center justify-center p-2 border-2 border-gray-400 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path
                            d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2h-1.528A6 6 0 004 9.528V4z" />
                        <path fill-rule="evenodd"
                            d="M8 10a4 4 0 00-3.446 6.032l-1.261 1.26a1 1 0 101.414 1.415l1.261-1.261A4 4 0 108 10zm-2 4a2 2 0 114 0 2 2 0 01-4 0z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="mt-3 text-sm font-medium text-gray-600 font-semibold">
                    Investigación
                </div>
            </a>
            {{-- app --}}
            <a href="#" class="flex flex-col items-center">

                <div class="flex items-center justify-center p-2 border-2 border-gray-400 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                </div>
                <div class="mt-3 text-sm font-medium text-gray-600 font-semibold">
                    Bachiler
                </div>
            </a>
            {{-- app --}}
            <a href="#" class="flex flex-col items-center">

                <div class="flex items-center justify-center p-2 border-2 border-gray-400 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path
                            d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z" />
                    </svg>
                </div>
                <div class="mt-3 text-sm font-medium text-gray-600 font-semibold">
                    Títulos profesionales
                </div>
            </a>
            {{-- app --}}
            <a href="#" class="flex flex-col items-center">

                <div class="flex items-center justify-center p-2 border-2 border-gray-400 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z" />
                      </svg>
                </div>
                <div class="mt-3 text-sm font-medium text-gray-600 font-semibold">
                    Plan de estudios
                </div>
            </a>
        </div>
    </div>



    {{-- Conteo de datos del db --}}
    <div class="container mx-auto my-10 grid">
        <div class="grid gap-6 mb-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5">
            {{-- 1-card --}}
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs border border border-gray-300 shadow">
                <div class="w-12 h-12 flex items-center mr-4 text-blue-500 bg-blue-100 rounded-full ">
                    <i class="fas fa-balance-scale text-lg m-auto"></i>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600">
                        Total proveedores
                    </p>
                    <p class="text-lg text-center font-semibold text-gray-700">
                        8
                    </p>
                </div>
            </div>
            {{-- 2-card --}}
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs border border border-gray-300 shadow">
                <div class="w-12 h-12 flex items-center mr-4 text-green-500 bg-green-100 rounded-full ">
                    <i class="fas fa-balance-scale text-lg m-auto"></i>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600">
                        Total entradas
                    </p>
                    <p class="text-lg text-center font-semibold text-gray-700">
                        23
                    </p>
                </div>
            </div>
            {{-- 3-card --}}
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs border border border-gray-300 shadow">
                <div class="w-12 h-12 flex items-center mr-4 text-purple-500 bg-purple-100 rounded-full ">
                    <i class="fas fa-balance-scale text-lg m-auto"></i>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600">
                        Total salidas
                    </p>
                    <p class="text-lg text-center font-semibold text-gray-700">
                        20
                    </p>
                </div>
            </div>
            {{-- 4-card --}}
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs border border border-gray-300 shadow">
                <div class="w-12 h-12 flex items-center mr-4 text-red-500 bg-red-100 rounded-full ">
                    <i class="fas fa-balance-scale text-lg m-auto"></i>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600">
                        Total responsables
                    </p>
                    <p class="text-lg text-center font-semibold text-gray-700">
                        3
                    </p>
                </div>
            </div>
            {{-- 5-card --}}
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs border border border-gray-300 shadow">
                <div class="w-12 h-12 flex items-center mr-4 text-yellow-500 bg-yellow-100 rounded-full ">
                    <i class="fas fa-balance-scale text-lg m-auto"></i>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600">
                        Total de clientes
                    </p>
                    <p class="text-lg text-center font-semibold text-gray-700">
                        11
                    </p>
                </div>
            </div>
        </div>
    </div>
    {{-- Actividades completas, imcompletas y accesdidos recientemente --}}
    <div class="container mx-auto  grid">
        <div class="grid gap-6 mb-4 sm:grid-cols-2  lg:grid-cols-5 ">
            <div class="col-span-2 flex justify-around">
                <!-- 1 card -->
                <div class="relative bg-white py-4 px-4 rounded-lg w-56 h-64 my-4 shadow-xl">
                    <div
                        class="w-12 h-12 flex items-center text-white  absolute rounded-full shadow-xl bg-yellow-700 left-4 -top-6">
                        <!-- icon  -->
                        <i class="fas fa-clipboard-check text-lg m-auto"></i>
                    </div>
                    <div class="mt-4">
                        <p class="text-xl font-semibold my-2">Actividades completas</p>
                        <div class="flex space-x-2 text-gray-400 text-sm">
                            <!-- icon  -->
                            <i class="fas fa-clipboard-list"></i>
                            <p class="ml-2">23 actividades</p>
                        </div>
                        <div class="flex space-x-2 text-gray-400 text-sm my-3">
                            <!-- icon  -->
                            <i class="fas fa-file-contract"></i>
                            <p class="ml-2">4 tipos</p>
                        </div>
                        <div class="border-t-2"></div>
                        <div class="flex justify-between">
                            {{-- responsables --}}
                            <div class="my-2">
                                <p class="font-semibold text-base mb-2">Responsables</p>
                                <div class="flex space-x-2">
                                    <div class="w-7 h-7 flex items-center text-white rounded-full bg-yellow-700">
                                        <p class="m-auto text-xs">R1</p>
                                    </div>
                                    <div class="w-7 h-7 flex items-center text-white rounded-full bg-yellow-700">
                                        <p class="m-auto text-xs">R1</p>
                                    </div>
                                    <div class="w-7 h-7 flex items-center text-white rounded-full bg-yellow-700">
                                        <p class="m-auto text-xs">R1</p>
                                    </div>
                                </div>
                            </div>
                            <div class="my-2 flex items-end">
                                <a href="#" class="btn btn-primary">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 2 card -->
                <div class="relative bg-white py-4 px-4 rounded-lg w-56 h-64 my-4 shadow-xl">
                    <div
                        class="w-12 h-12 flex items-center text-white  absolute rounded-full shadow-xl bg-pink-700 left-4 -top-6">
                        <!-- icon  -->
                        <i class="far fa-clipboard text-lg m-auto"></i>
                    </div>
                    <div class="mt-4">
                        <p class="text-xl font-semibold my-2">Actividades incompletas</p>
                        <div class="flex space-x-2 text-gray-400 text-sm">
                            <!-- icon  -->
                            <i class="fas fa-clipboard-list"></i>
                            <p class="ml-2">6 actividades</p>
                        </div>
                        <div class="flex space-x-2 text-gray-400 text-sm my-3">
                            <!-- icon  -->
                            <i class="fas fa-file-contract"></i>
                            <p class="ml-2">3 tipos</p>
                        </div>
                        <div class="border-t-2"></div>

                        <div class="flex justify-between">
                            {{-- responsables --}}
                            <div class="my-2">
                                <p class="font-semibold text-base mb-2">Responsables</p>
                                <div class="flex space-x-2">
                                    <div class="w-7 h-7 flex items-center text-white rounded-full bg-pink-700">
                                        <p class="m-auto text-xs">R1</p>
                                    </div>
                                    <div class="w-7 h-7 flex items-center text-white rounded-full bg-pink-700">
                                        <p class="m-auto text-xs">R1</p>
                                    </div>
                                </div>
                            </div>
                            <div class="my-2 flex items-end">
                                <a href="#" class="btn btn-primary">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-3 bg-white py-4 px-4 rounded-lg my-4 shadow-xl">
                <p>Actividades a los que se ha accesdido recientemente</p>
                <div class="grid gap-4 grid-cols-3">
                    <!-- 1 card -->
                    <div
                        class="relative bg-white p-4 rounded-lg  mt-2  flex flex-col justify-between border-2 border-gray-200 ">
                        <div class="w-12 h-12 flex items-center text-white rounded-full shadow-xl bg-green-700  m-auto">
                            <!-- icon  -->
                            <i class="fab fa-flipboard text-lg m-auto"></i>
                        </div>
                        <div class="my-2 text-center">
                            <p class="text-xl font-semibold my-2">Planificar la gestión de
                                Enseñanza - Aprendizaje</p>
                            <div class="flex space-x-2 text-gray-400 text-sm my-3 justify-center">
                                <!-- icon  -->
                                <i class="fas fa-file-contract"></i>
                                <p class="ml-2">Planificar</p>
                            </div>
                        </div>
                        <div class="border-t-2 my-2"></div>
                        <div class="my-2 text-center">
                            <a href="#" class="btn btn-primary">
                                <i class="fas fa-eye"></i>
                            </a>
                        </div>
                    </div>
                    <!-- 2 card -->
                    <div
                        class="relative bg-white p-4 rounded-lg  mt-2 flex flex-col justify-between border-2 border-gray-200">
                        <div class="w-12 h-12 flex items-center text-white rounded-full shadow-xl bg-green-700  m-auto">
                            <!-- icon  -->
                            <i class="fab fa-flipboard text-lg m-auto"></i>
                        </div>
                        <div class="my-2 text-center">
                            <p class="text-xl font-semibold my-2">Elaborar y publicar
                                silabo</p>
                            <div class="flex space-x-2 text-gray-400 text-sm my-3 justify-center">
                                <!-- icon  -->
                                <i class="fas fa-file-contract"></i>
                                <p class="ml-2">Hacer</p>
                            </div>
                        </div>
                        <div class="border-t-2 my-2"></div>
                        <div class="my-2 text-center">
                            <a href="#" class="btn btn-primary">
                                <i class="fas fa-eye"></i>
                            </a>
                        </div>
                    </div>
                    <!-- 3 card -->
                    <div
                        class="relative bg-white p-4 rounded-lg  mt-2 flex flex-col justify-between border-2 border-gray-200">
                        <div class="w-12 h-12 flex items-center text-white rounded-full shadow-xl bg-green-700  m-auto">
                            <!-- icon  -->
                            <i class="fab fa-flipboard text-lg m-auto"></i>
                        </div>
                        <div class="my-2 text-center">
                            <p class="text-xl font-semibold my-2">Desarrollar sesiones
                                de clase</p>
                            <div class="flex space-x-2 text-gray-400 text-sm my-3 justify-center">
                                <!-- icon  -->
                                <i class="fas fa-file-contract"></i>
                                <p class="ml-2">Hacer</p>
                            </div>
                        </div>
                        <div class="border-t-2 my-2"></div>
                        <div class="my-2 text-center">
                            <a href="#" class="btn btn-primary">
                                <i class="fas fa-eye"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Cronologia de actividades --}}
    {{-- se puede ordernar mediante el id --}}
    <div class="bg-gray-100 p-4 min-h-screen rounded-lg shadow-xl">
        <p>Cronología de actividades</p>
        <div class="min-h-screen pt-4 flex justify-center">
            <div class="w-2/3 mx-auto">
                {{-- Primera actividad impar --}}
                <div class="flex flex-row w-full">
                    <!-- left col -->
                    <div class="w-2/5 px-2 py-2">
                        <div class="flex flex-col w-full rounded-lg shadow bg-white px-4 py-5">
                            <div class="text-gray-600 mb-2 flex justify-between">
                                <div class="font-bold">
                                    Planificar la gestión de Enseñanza - Aprendizaje
                                </div>
                                <div class="flex flex-row">
                                    <button class="text-blue-500 mr-2 hover:text-blue-300 transition duration-200"><i
                                            class="far fa-edit"></i></button>
                                    <button class="text-red-500 mr-2 hover:text-blue-300 transition duration-200"><i
                                            class="far fa-trash-alt"></i></button>
                                    <button class="text-purple-500 hover:text-red-300 transition duration-200"><i
                                            class="far fa-eye"></i></button>
                                </div>
                            </div>
                            <div class="rounded-sm p-2 border-2 border-gray-400 text-center">
                                <p class="text-gray-400 ">Tipo de actividad:</p>
                                <p class="text-gray-800 ">Planificar</p>
                                <p class="text-gray-400 ">Proceso:</p>
                                <p class="text-gray-800 ">Enseñanza y Aprendizaje</p>
                            </div>
                        </div>

                    </div>
                    <!--line column-->
                    <div class="w-1/5  flex justify-center">
                        <div class="relative flex h-full w-1 bg-green-300 items-center justify-center">
                            <div
                                class="absolute flex flex-col justify-center h-20 w-20 rounded-full border-2 border-green-300 leading-none text-center z-10 bg-white font-thin">
                                <div>1ª</div>
                                <div>Actividad</div>
                            </div>
                        </div>
                    </div>
                    <!--right column-->
                    <div class="w-2/5 px-2 py-2 ">

                    </div>
                </div>
                {{-- Primera actividad par --}}
                <div class="flex flex-row w-full">
                    <!-- left col -->

                    <div class="w-2/5 px-2 py-2">

                    </div>
                    <!--line column-->
                    <div class="w-1/5  flex justify-center">
                        <div class="relative flex h-full w-1 bg-green-300 items-center justify-center">
                            <div
                                class="absolute flex flex-col justify-center h-20 w-20 rounded-full border-2 border-green-300 leading-none text-center z-10 bg-white font-thin">
                                <div>2ª</div>
                                <div>Actividad</div>
                            </div>
                        </div>
                    </div>
                    <!--right column-->
                    <div class="w-2/5 px-2 py-2 ">
                        <div class="flex flex-col w-full rounded-lg shadow bg-white px-4 py-5">
                            <div class="text-gray-600 mb-2 flex justify-between">
                                <div class="font-bold">
                                    Planificar la gestión de Enseñanza - Aprendizaje
                                </div>
                                <div class="flex flex-row">
                                    <button class="text-blue-500 mr-2 hover:text-blue-300 transition duration-200"><i
                                            class="far fa-edit"></i></button>
                                    <button class="text-red-500 mr-2 hover:text-blue-300 transition duration-200"><i
                                            class="far fa-trash-alt"></i></button>
                                    <button class="text-purple-500 hover:text-red-300 transition duration-200"><i
                                            class="far fa-eye"></i></button>
                                </div>
                            </div>
                            <div class="rounded-sm p-2 border-2 border-gray-400 text-center">
                                <p class="text-gray-400 ">Tipo de actividad:</p>
                                <p class="text-gray-800 ">Planificar</p>
                                <p class="text-gray-400 ">Proceso:</p>
                                <p class="text-gray-800 ">Enseñanza y Aprendizaje</p>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Segunda actividad impar --}}
                {{-- Segunda actividad par --}}
                {{-- .... --}}

            </div>
        </div>
    </div>


    <script>
        (function() {
            var updatetime = function() {
                // Obtenemos la fecha actual, incluyendo las horas, minutos, segundos, dia de la semana, dia del mes, mes y año;
                var date = new Date(),
                    hour = date.getHours(),
                    minute = date.getMinutes(),
                    second = date.getSeconds(),
                    weekday = date.getDay(),
                    day = date.getDate(),
                    month = date.getMonth(),
                    year = date.getFullYear();

                // Accedemos a los elementos del DOM para agregar mas adelante sus correspondientes valores
                var dhour = document.getElementById('hour'),
                    dminute = document.getElementById('minute'),
                    dsecond = document.getElementById('second'),
                    dweekday = document.getElementById('weekday'),
                    dday = document.getElementById('day'),
                    dmonth = document.getElementById('month'),
                    dyear = document.getElementById('year');


                // Obtenemos el dia se la semana y lo mostramos
                var week = ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'];
                dweekday.textContent = week[weekday];

                // Obtenemos el dia del mes
                dday.textContent = day;

                // Obtenemos el Mes y año y lo mostramos
                var months = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto',
                    'Septiembre',
                    'Octubre', 'Noviembre', 'Diciembre'
                ]
                dmonth.textContent = months[month];
                dyear.textContent = year;

                // Cambiamos las hora de 24 a 12 horas y establecemos si es AM o PM

                if (hour >= 12) {
                    hour = hour - 12;
                }

                // Detectamos cuando sean las 0 AM y transformamos a 12 AM
                if (hour == 0) {
                    hour = 12;
                }

                // Si queremos mostrar un cero antes de las horas ejecutamos este condicional
                // if (horas < 10){horas = '0' + horas;}
                dhour.textContent = hour;

                // Minutos y Segundos
                if (minute < 10) {
                    minute = "0" + minute;
                }
                if (second < 10) {
                    second = "0" + second;
                }

                dminute.textContent = minute;
                dsecond.textContent = second;
            };

            updatetime();
            var interval = setInterval(updatetime, 1000);
        }())
    </script>

</x-app-layout>
