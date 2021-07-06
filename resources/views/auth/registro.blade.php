<x-guest-layout>


    <div class="w-10/12 lg:w-8/12 mx-auto mt-12">

        <div class="flex items-start justify-start mb-6">
            <img src="{{ asset('images/unasam_escudo.svg') }}" class="h-12 w-12 mt-1 mr-2"
                 alt="Escudo de la Unasam">
            <div>
                <h2 class="text-gray-700 text-2xl sm:text-sm lg:text-2xl font-bold">
                    Registrese en el
                    <span class="text-blue-500">Sistema de Gestión de Calidad</span>
                </h2>
                <p class="mt-1 text-sm text-gray-400">
                    Consigne su información personal, la oficina donde pertenece y sus credenciales de
                    acceso
                </p>
            </div>
        </div>

        <x-card>
            <div class="my-6 col-span-12">
                <x-jet-validation-errors class="my-4"/>
            </div>
            <form method="POST" action="{{ route('register') }}" autocomplete="off">
                @csrf
                <div class="grid grid-cols-12 gap-6">
                    <div class="col-span-12">
                        <h1 class="text-gray-400 text-lg">Datos personales</h1>
                    </div>
                    <div class="col-span-12 sm:col-span-6 lg:col-span-2">
                        <x-jet-label for="dni" value="{{ __('DNI') }}"/>
                        <x-jet-input id="dni" class="mt-1 w-full" type="number" name="dni"
                                     :value="old('dni')" required autofocus/>
                    </div>
                    <div class="col-span-12 sm:col-span-6 lg:col-span-5">
                        <x-jet-label for="nombres" value="{{ __('Nombres') }}"/>
                        <x-jet-input id="nombres" class="mt-1 w-full" type="text" name="nombres"
                                     :value="old('nombres')" require/>
                    </div>
                    <div class="col-span-12 sm:col-span-6 lg:col-span-5">
                        <x-jet-label for="apellidos" value="{{ __('Apellidos') }}"/>
                        <x-jet-input id="apellidos" class="block mt-1 w-full" type="text"
                                     name="apellidos" :value="old('apellidos')" required/>
                    </div>

                    <div class="col-span-12 mt-6">
                        <h1 class="text-gray-400 text-lg">Datos de la oficina</h1>
                    </div>
                    <div class="col-span-12 md:col-span-4">
                        <x-jet-label for="nivel" value="{{ __('Nivel') }}"/>
                        <select name="nivel" id="nivel"
                                class="mt-1 border-gray-300 focus:border-blue-300 focus:ring-3 focus:ring-blue-200 rounded shadow-sm w-full">
                            <option value="0" class="text-gray-500">-- Seleccione --</option>
                            @foreach($niveles as $nivel)
                                <option
                                    value="{{ $nivel->id }}" {{ old('nivel') == $nivel->id ? "selected" :""}}>
                                    {{ $nivel->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-span-12 md:col-span-4">
                        <x-jet-label for="facultad" value="{{ __('Facultad') }}"/>
                        <select name="facultad" id="facultad"
                                class="mt-1 border-gray-300 focus:border-blue-300 focus:ring-3 focus:ring-blue-200 rounded shadow-sm w-full">
                            <option value="0" class="text-gray-500">-- Seleccione su nivel --</option>
                            @foreach($niveles as $nivel)
                                <option
                                    value="{{ $nivel->id }}" {{ old('nivel') == $nivel->id ? "selected" :""}}>
                                    {{ $nivel->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-span-12 md:col-span-4">
                        <x-jet-label for="escuela" value="{{ __('Escuela') }}"/>
                        <select name="escuela" id="escuela"
                                class="mt-1 border-gray-300 focus:border-blue-300 focus:ring-3 focus:ring-blue-200 rounded shadow-sm w-full">
                            <option value="0" class="text-gray-500">-- Seleccione su nivel --</option>
                            @foreach($niveles as $nivel)
                                <option
                                    value="{{ $nivel->id }}" {{ old('nivel') == $nivel->id ? "selected" :""}}>
                                    {{ $nivel->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-span-12 md:col-span-4">
                        <x-jet-label for="oficina" value="{{ __('Oficina') }}"/>
                        <select name="oficina" id="oficina"
                                class="mt-1 border-gray-300 focus:border-blue-300 focus:ring-3 focus:ring-blue-200 rounded shadow-sm w-full">
                            <option value="0">-- Seleccione su oficina --</option>
                            {{--                                            @foreach($oficinas as $oficina)--}}
                            {{--                                                <option--}}
                            {{--                                                    value="{{ $oficina->id }}" {{ old('oficina') == $oficina->id ? "selected" :""}}>--}}
                            {{--                                                    {{ $oficina->nombre }}--}}
                            {{--                                                </option>--}}
                            {{--                                            @endforeach--}}
                        </select>
                    </div>

                </div>

                <div class="mt-8 shadow-sm overflow-hidden sm:rounded-md border border-gray-200">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">


                            <div class="col-span-6 mt-6">
                                <h1 class="text-gray-400 text-lg">
                                    Datos de acceso
                                </h1>
                            </div>

                            <div class="col-span-6">
                                <x-jet-label for="email" value="{{ __('Correo Eletrónico') }}"/>
                                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email"
                                             :value="old('email')" required/>
                            </div>

                            <div class="col-span-6 lg:col-span-3">
                                <x-jet-label for="password" value="{{ __('Password') }}"/>
                                <x-jet-input id="password" class="block mt-1 w-full" type="password"
                                             name="password" required
                                             autocomplete="new-password"/>
                            </div>

                            <div class="col-span-6 lg:col-span-3">
                                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}"/>
                                <x-jet-input id="password_confirmation" class="block mt-1 w-full"
                                             type="password"
                                             name="password_confirmation" required autocomplete="new-password"/>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <div class="flex items-center justify-between mt-4">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900"
                               href="{{ route('login') }}">
                                {{ __('¿Ya estás registrado?') }}
                            </a>

                            <x-jet-button class="ml-4">
                                {{ __('Registrarse') }}
                            </x-jet-button>
                        </div>
                    </div>
                </div>
            </form>


        </x-card>

        <div class="mt-10 sm:mt-0">
            <div class="md:grid md:grid-cols-5 md:gap-6">
                <div class="md:col-span-2 mt-2">
                    <div class="px-4 sm:px-0">

                    </div>

                </div>
                <div class="mt-5 md:mt-0 md:col-span-3">
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
