<nav x-data="{ open: false }" class="bg-gray-800">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">

            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('images/unasam_escudo.svg') }}" class="h-8 w-8" alt="Unasam">
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-4 md:-my-px md:ml-10 md:flex">
                    {{-- Administrador --}}
                    @if(\Illuminate\Support\Facades\Auth::user()->hasRole('Administrador'))
                        <x-jet-nav-link href="{{ route('admin.usuarios') }}"
                                        :active="request()->routeIs('admin.usuarios.*')">
                            {{ __('Usuarios') }}
                        </x-jet-nav-link>

                        <x-jet-nav-link href="{{ route('admin.entidades') }}"
                                        :active="request()->routeIs('admin.entidades')">
                            {{ __('Entidades') }}
                        </x-jet-nav-link>

                        <x-jet-nav-link href="{{ route('admin.otros') }}"
                                        :active="request()->routeIs('admin.otros')">
                            {{ __('Otros') }}
                        </x-jet-nav-link>
                    @else
                        {{-- Otros Usuarios --}}
                        @if(!\Illuminate\Support\Facades\Auth::user()->hasRole('Estudiante'))
                            <x-jet-nav-link href="{{ route('actividad.actividades') }}"
                                            :active="request()->routeIs('actividad.*')">
                                {{ __('Actividades') }}
                            </x-jet-nav-link>
                        @endif
                        {{-- @endif --}}
                        <x-jet-nav-link href="{{ route('rrss.index') }}" :active="request()->routeIs('rrss.*')">
                            {{ __('Responsabilidad Social') }}
                        </x-jet-nav-link>

                        <x-jet-nav-link href="{{ route('investigacion.index') }}"
                                        :active="request()->routeIs('investigacion.*')">
                            {{ __('Investigación') }}
                        </x-jet-nav-link>


                        <x-jet-nav-link href="{{ route('bachiller.index') }}"
                                        :active="request()->routeIs('bachiller.*')">
                            {{ __('Bachiller') }}
                        </x-jet-nav-link>

                        <x-jet-nav-link href="{{ route('ttpp.index') }}" :active="request()->routeIs('ttpp.*')">
                            {{ __('Título Profesional') }}
                        </x-jet-nav-link>

                        <x-jet-nav-link href="{{ route('convalidacion.index') }}"
                                        :active="request()->routeIs('convalidacion.*')">
                            {{ __('Convalidación') }}
                        </x-jet-nav-link>

                        {{-- Todo: Debe ir al ultimo --}}
                        <x-jet-nav-link href="{{ route('indicadores.index') }}"
                                        :active="request()->routeIs('indicadores.*')">
                            {{ __('Indicadores') }}
                        </x-jet-nav-link>
                    @endif

                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <!-- Settings Dropdown -->
                <div class="ml-3 relative">
                    <x-jet-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button
                                    class="flex text-sm rounded focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded object-cover"
                                         src="{{ Auth::user()->profile_photo_path ? Auth::user()->profile_photo_url : asset('images/male_profile.jpg') }}"
                                         alt="{{ Auth::user()->name }}"/>
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button"
                                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 hover:text-gray-700 focus:outline-none transition">
                                        {{ strtok(Auth::user()->persona->apellidos, ' ') }}
                                        {{ strtok(Auth::user()->persona->nombres, ' ') }}
                                        <x-icons.dropdown :stroke="2" class="ml-2 -mr-0.5 h-4 w-4"></x-icons.dropdown>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ strtok(Auth::user()->persona->apellidos, ' ') . ' ' . strtok(Auth::user()->persona->nombres, ' ') }}
                            </div>

                            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Mi perfíl') }}
                            </x-jet-dropdown-link>

                            <div class="border-t border-gray-100"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-jet-dropdown-link href="{{ route('logout') }}"
                                                     onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Cerrar Sesión') }}
                                </x-jet-dropdown-link>
                            </form>
                        </x-slot>
                    </x-jet-dropdown>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center md:hidden">
                <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden md:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-jet-responsive-nav-link href="{{ route('actividad.actividades') }}"
                                       :active="request()->routeIs('actividad.*')">
                {{ __('Actividades') }}
            </x-jet-responsive-nav-link>
            <x-jet-responsive-nav-link href="{{ route('rrss.index') }}" :active="request()->routeIs('rrss.*')">
                {{ __('Responsabilidad Social') }}
            </x-jet-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4 text-gray-400">
                {{ strtok(Auth::user()->persona->apellidos, ' ') . ' ' . strtok(Auth::user()->persona->nombres, ' ') }}
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-jet-responsive-nav-link href="{{ route('profile.show') }}"
                                           :active="request()->routeIs('profile.show')">
                    {{ __('Mi perfíl') }}
                </x-jet-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-jet-responsive-nav-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                    this.closest('form').submit();">
                        {{ __('Cerrar Sesión') }}
                    </x-jet-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
