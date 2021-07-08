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
    <div class="container mx-auto my-4 grid">
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4 items-center">
            {{-- Bienvenida --}}
            <div class="col-span-3">
                <p class="text-gray-800">Bienvenido a la gestión de calidad de Ciencias Medicas </p>
                <div class="rounded-lg p-4 border-2 border-gray-400">
                    <p class="text-gray-400" id="userName">
                        Rosales Valladares Jhosmel
                    </p>
                </div>
            </div>
            {{-- Fecha actual --}}
            <div class="flex items-center">
                <div class="m-auto rounded-lg border-2 border-blue-500 w-2/4 text-center">
                    <p class="text-lg text-blue-500">Jueves</p>
                    <p class="text-5xl font-bold text-blue-500">28</p>
                    <p class="text-lg text-blue-500">Julio</p>
                    <p class="text-lg text-blue-50 bg-blue-500">2021</p>
                </div>

            </div>
        </div>
    </div>

    {{-- Conteo de datos del db --}}
    <div class="container mx-auto my-4 grid">
        <div class="grid gap-6 mb-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5">
            {{-- 1-card --}}
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
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
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
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
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
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
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
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
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
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

</x-app-layout>
