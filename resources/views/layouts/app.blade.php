<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="icon" href="{{ asset('icons/sgc.svg') }}" sizes="any" type="image/svg+xml">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
{{-- fontawsome --}}
{{--    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"--}}
{{--          integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">--}}
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"--}}
{{--          integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="--}}
{{--          crossorigin="anonymous"/>--}}

<!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles
@stack('css')

<!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

</head>

<body class="font-sans antialiased bg-gray-100">
<x-jet-banner></x-jet-banner>

<div class="">
    @livewire('navigation-menu')
    <!-- Page Heading -->
    @if (isset($header))
        <header class="bg-gray-50 border-b border-gray-200">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endif

<!-- Page Content -->
    <main class="my-8 max-w-7xl mx-auto px-2 sm:px-4">
        {{ $slot }}
    </main>

    {{--    <footer class="border-t border-gray-300 text-center py-4 text-gray-600 text-sm bg-transparent">--}}
    {{--        Copyright © Sistema Gestión de Calidad - Facultad de Ciencias Médicas--}}
    {{--    </footer>--}}
</div>

@stack('modals')

@livewireScripts

@stack('js')

</body>

</html>

