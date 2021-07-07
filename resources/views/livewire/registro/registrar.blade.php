<x-card>
    <div class="px-6">
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
                    <x-jet-input id="dni" class="mt-1 w-full" type="text" name="dni"
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
                <div class="col-span-12 md:col-span-6 lg:col-span-4">
                    <x-jet-label for="nivel" value="{{ __('Nivel') }}"/>
                    <select name="nivel" wire:model="nivel" required
                            class="mt-1 border-gray-300 focus:border-blue-300 focus:ring-3 focus:ring-blue-200 rounded shadow-sm w-full">
                        <option value="0" class="text-gray-500" selected>Seleccione</option>
                        @foreach($niveles as $nvl)
                            <option
                                value="{{ $nvl->id }}" {{ old('nivel') == $nvl->id ? "selected" :""}}>
                                {{ $nvl->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
                @if(!is_null($facultades) and $facultades->count())
                    <div class="col-span-12 md:col-span-6 lg:col-span-4">
                        <x-jet-label for="facultad" value="{{ __('Facultad') }}"/>
                        <select wire:model="facultad"
                                class="mt-1 border-gray-300 focus:border-blue-300 focus:ring-3 focus:ring-blue-200 rounded shadow-sm w-full">

                            <option value="0" class="text-gray-500" selected>Seleccione</option>

                            @foreach($facultades as $fcd)
                                <option
                                    value="{{ $fcd->id }}" {{ old('nivel') == $fcd->id ? "selected" :""}}>
                                    {{ $fcd->nombre }}
                                </option>
                            @endforeach

                        </select>
                    </div>
                @endif
                @if(!is_null($escuelas) and $escuelas->count())
                    <div class="col-span-12 md:col-span-6 lg:col-span-4">
                        <x-jet-label for="escuela" value="{{ __('Escuela') }}"/>
                        <select wire:model="escuela"
                                class="mt-1 border-gray-300 focus:border-blue-300 focus:ring-3 focus:ring-blue-200 rounded shadow-sm w-full">

                            <option value="0" class="text-gray-500" selected>Seleccione</option>

                            @foreach($escuelas as $esc)
                                <option
                                    value="{{ $esc->id }}" {{ old('nivel') == $esc->id ? "selected" :""}}>
                                    {{ $esc->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                @endif
                @if(!is_null($oficinas) and $oficinas->count())
                    <div class="col-span-12 md:col-span-6 lg:col-span-4">
                        <x-jet-label for="oficina" value="{{ __('Oficina') }}"/>
                        <select name="oficina" id="oficina" wire:model.defer="oficina" required
                                class="mt-1 border-gray-300 focus:border-blue-300 focus:ring-3 focus:ring-blue-200 rounded shadow-sm w-full">
                            <option value="0" class="text-gray-500" selected>Seleccione</option>
                            @foreach($oficinas as $ofc)
                                <option
                                    value="{{ $ofc->id }}" {{ old('oficina') == $ofc->id ? "selected" :""}}>
                                    {{ $ofc->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                @endif

                <div class="col-span-12 mt-6">
                    <h1 class="text-gray-400 text-lg">Datos de acceso</h1>
                </div>
                <div class="col-span-12 lg:col-span-6">
                    <x-jet-label for="email" value="{{ __('Correo Eletrónico') }}"/>
                    <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email"
                                 :value="old('email')" required/>
                </div>
                <div class="col-span-12 md:col-span-6 lg:col-span-3">
                    <x-jet-label for="password" value="{{ __('Contraseña') }}"/>
                    <x-jet-input id="password" class="block mt-1 w-full" type="password"
                                 name="password" required
                                 autocomplete="new-password"/>
                </div>
                <div class="col-span-12 md:col-span-6 lg:col-span-3">
                    <x-jet-label for="password_confirmation" value="{{ __('Repita su contraseña') }}"/>
                    <x-jet-input id="password_confirmation" class="block mt-1 w-full"
                                 type="password"
                                 name="password_confirmation" required autocomplete="new-password"/>
                </div>

                <div class="col-span-12 py-3 text-right w-full">
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
    </div>
</x-card>
