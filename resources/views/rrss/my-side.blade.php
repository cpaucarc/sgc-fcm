<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
{{-- fontawsome --}}

<!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

</head>
<body class="font-sans antialiased bg-gray-100">

<div class="min-h-screen">
    {{--    @livewire('navigation-menu')--}}

    <div class="flex">
        <aside class="sticky top-0 w-72 hidden lg:block max-w-2xl bg-white h-screen" x-data="init()">
            <div class="mt-2 mb-3 px-2">
                <a href="{{ route('dashboard') }}" class="flex-shrink-0 flex items-center">
                    <img src="{{ asset('images/unasam_escudo.svg') }}" class="h-10 w-10 mr-2" alt="Unasam">

                    <span class="text-2xl font-bold text-gray-800">
                    {{ __('SGC - FCM') }}
                    </span>
                </a>
            </div>
            <div class="mt-4">
                <ul class="space-y-4 px-2">
                    <li class="bg-green-500 hover:bg-green-600">Elemento 1</li>
                    <li class="bg-green-500 hover:bg-green-600">Elemento 1</li>
                    <li @click="openElem1 = !openElem1"
                        class="group cursor-pointer py-2 px-3 rounded bg-transparent text-gray-500 hover:bg-gray-100 hover:text-gray-900">
                        <button class="nav-link collapsed flex items-center text-lg">
                            <svg class="h-6 w-6 mr-2 group-hover:text-gray-700" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                      d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"/>
                            </svg>
                            <span>Actividades</span>
                        </button>
                        <div id="collapseTwo" x-show="openElem1" @click.away="openElem1 = false"
                             x-transition:enter.duration.500ms x-transition:leave.duration.400ms>
                            <div class="bg-white p-2 rounded mt-2 space-y-4 flex flex-col">
                                <a class="collapse-item" href="#">Vista por Estudiante</a>
                                <a class="collapse-item" href="#">Vista por Cursos</a>
                                <a class="collapse-item" href="#">Vista por Programas</a>
                                <a class="collapse-item" href="#">Vista por Areas</a>
                            </div>
                        </div>
                    </li>

                    <li @click="openElem2 = !openElem2"
                        class="group cursor-pointer py-2 px-3 rounded bg-transparent text-gray-500 hover:bg-gray-100 hover:text-gray-900">
                        <button class="nav-link collapsed flex items-center text-lg">
                            <svg class="h-6 w-6 mr-2 group-hover:text-gray-700" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                      d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"/>
                            </svg>
                            <span>Actividades</span>
                        </button>
                        <div id="collapseTwo" x-show="openElem2" @click.away="openElem2 = false"
                             x-transition:enter.duration.500ms x-transition:leave.duration.400ms>
                            <div class="bg-white p-2 rounded mt-2 space-y-4 flex flex-col">
                                <a class="collapse-item" href="#">Vista por Estudiante</a>
                                <a class="collapse-item" href="#">Vista por Cursos</a>
                                <a class="collapse-item" href="#">Vista por Programas</a>
                                <a class="collapse-item" href="#">Vista por Areas</a>
                            </div>
                        </div>
                    </li>

                    <li @click="openElem3 = !openElem3"
                        class="group cursor-pointer py-2 px-3 rounded bg-transparent text-gray-500 hover:bg-gray-100 hover:text-gray-900">
                        <button class="nav-link collapsed flex items-center text-lg">
                            <svg class="h-6 w-6 mr-2 group-hover:text-gray-700" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                      d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"/>
                            </svg>
                            <span>Actividades</span>
                        </button>
                        <div id="collapseTwo" x-show="openElem3" @click.away="openElem3 = false"
                             x-transition:enter.duration.500ms x-transition:leave.duration.400ms>
                            <div class="bg-white p-2 rounded mt-2 space-y-4 flex flex-col">
                                <a class="collapse-item" href="#">Vista por Estudiante</a>
                                <a class="collapse-item" href="#">Vista por Cursos</a>
                                <a class="collapse-item" href="#">Vista por Programas</a>
                                <a class="collapse-item" href="#">Vista por Areas</a>
                            </div>
                        </div>
                    </li>

                    <li @click="openElem4 = !openElem4"
                        class="group cursor-pointer py-2 px-3 rounded bg-transparent text-gray-500 hover:bg-gray-100 hover:text-gray-900">
                        <button class="nav-link collapsed flex items-center text-lg">
                            <svg class="h-6 w-6 mr-2 group-hover:text-gray-700" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                      d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"/>
                            </svg>
                            <span>Actividades</span>
                        </button>
                        <div id="collapseTwo" x-show="openElem4" @click.away="openElem4 = false"
                             x-transition:enter.duration.500ms x-transition:leave.duration.400ms>
                            <div class="bg-white p-2 rounded mt-2 space-y-4 flex flex-col">
                                <a class="collapse-item" href="#">Vista por Estudiante</a>
                                <a class="collapse-item" href="#">Vista por Cursos</a>
                                <a class="collapse-item" href="#">Vista por Programas</a>
                                <a class="collapse-item" href="#">Vista por Areas</a>
                            </div>
                        </div>
                    </li>
                    <li class="bg-green-500 hover:bg-green-600">Elemento 1</li>
                    <li class="bg-green-500 hover:bg-green-600">Elemento 1</li>
                    <li class="bg-green-500 hover:bg-green-600">Elemento 1</li>
                    <li class="bg-green-500 hover:bg-green-600">Elemento 1</li>
                    <li class="bg-green-500 hover:bg-green-600">Elemento 1</li>
                    <li class="bg-green-500 hover:bg-green-600">Elemento 1</li>
                    <li class="bg-green-500 hover:bg-green-600">Elemento 1</li>
                    <li class="bg-green-500 hover:bg-green-600">Elemento 1</li>
                </ul>
            </div>
        </aside>

        <main class="flex-1">
            @livewire('navigation-menu')
            <div class="mx-auto w-11/12">
                @livewire('rrss.listar-rrss')
            </div>
        </main>
    </div>
</div>

@stack('modals')

@livewireScripts

<script>
    function init() {
        return {
            openElem1: false,
            openElem2: false,
            openElem3: false,
            openElem4: false,
        };
    }
</script>

</body>
</html>
