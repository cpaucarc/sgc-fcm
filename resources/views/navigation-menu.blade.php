<nav x-data="{ open: false }" class="bg-gray-50 border-b border-gray-200">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 md:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('images/unasam_escudo.svg') }}" class="h-8 w-8" alt="Unasam">
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-4 md:-my-px md:ml-10 md:flex">

                    {{-- @if (Auth::user()->oficina->entidad->responsable) --}}
                    @if(!\Illuminate\Support\Facades\Auth::user()->esEstudiante())
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


                    <x-jet-nav-link href="{{ route('bachiller.index') }}" :active="request()->routeIs('bachiller.*')">
                        {{ __('Bachiller') }}
                    </x-jet-nav-link>
                    
                    <x-jet-nav-link href="{{ route('ttpp.index') }}" :active="request()->routeIs('ttpp.*')">
                        {{ __('Título Profesional') }}
                    </x-jet-nav-link>
                    
                    <x-jet-nav-link href="{{ route('convalidacion.index') }}"
                        :active="request()->routeIs('convalidacion.*')">
                        {{ __('convalidación') }}
                    </x-jet-nav-link>

                    <x-jet-dropdown align="false" width="64">
                        <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button"
                                            class="inline-flex h-16 mt-0.5 items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 hover:text-gray-700 focus:outline-none transition">
                                        {{ __("Otros") }}
                                        <x-icons.dropdown :stroke="2" class="ml-2 -mr-0.5 h-4 w-4"></x-icons.dropdown>
                                    </button>
                                </span>
                        </x-slot>

                        <x-slot name="content">

                            <div class="p-4 space-y-2">

                                <x-jet-dropdown-link href="{{ route('plan_estudios.index') }}" class="rounded">
                                    <div class="group flex items-center text-gray-500 hover:text-gray-700">
                                        <x-icons.academic class="flex-shrink-0 h-6 w-6 mr-2 group-hover:text-gray-600"
                                                          stroke="1.25"></x-icons.academic>
                                        {{ __('Plan de estudios') }}
                                    </div>
                                </x-jet-dropdown-link>

                            </div>

                        </x-slot>
                    </x-jet-dropdown>

                    {{-- Todo: Debe ir al ultimo --}}
                    <x-jet-nav-link href="{{ route('indicadores.index') }}"
                        :active="request()->routeIs('indicadores.*')">
                        {{ __('Indicadores') }}
                    </x-jet-nav-link>
                </div>
            </div>


            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="ml-3 relative">
                        <x-jet-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button"
                                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
                                        {{ Auth::user()->currentTeam->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                             viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                  d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>

                            <x-slot name="content">
                                <div class="w-60">
                                    <!-- Team Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Team') }}
                                    </div>

                                    <!-- Team Settings -->
                                    <x-jet-dropdown-link
                                        href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                        {{ __('Team Settings') }}
                                    </x-jet-dropdown-link>

                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                        <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                            {{ __('Create New Team') }}
                                        </x-jet-dropdown-link>
                                    @endcan

                                    <div class="border-t border-gray-100"></div>

                                    <!-- Team Switcher -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Switch Teams') }}
                                    </div>

                                    @foreach (Auth::user()->allTeams() as $team)
                                        <x-jet-switchable-team :team="$team"/>
                                    @endforeach
                                </div>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
            @endif

            <!-- Settings Dropdown -->
                <div class="ml-3 relative">
                    <x-jet-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button
                                    class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover"
                                         src="{{ Auth::user()->profile_photo_url }}"
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
                                {{ Auth::user()->email }}
                            </div>

                            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Mi perfíl') }}
                            </x-jet-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-jet-dropdown-link>
                            @endif

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
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
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
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="flex-shrink-0 mr-3">
                        <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                            alt="{{ Auth::user()->persona->nombres }}" />
                    </div>
                @endif
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-jet-responsive-nav-link href="{{ route('profile.show') }}"
                                           :active="request()->routeIs('profile.show')">
                    {{ __('Mi perfíl') }}
                </x-jet-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}"
                                               :active="request()->routeIs('api-tokens.index')">
                        {{ __('API Tokens') }}
                    </x-jet-responsive-nav-link>
                @endif

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
