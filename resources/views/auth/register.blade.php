<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            {{--            <x-jet-authentication-card-logo/>--}}
            <img src="{{ asset('images/unasam_escudo.svg') }}" class="h-12 w-12" alt="Escudo de la Unasam">
        </x-slot>

        <x-jet-validation-errors class="mb-4"/>

        <form method="POST" action="{{ route('register') }}" autocomplete="off">
            @csrf

            <div class="mt-4">
                <x-jet-label for="dni" value="{{ __('DNI') }}"/>
                <x-jet-input id="dni" class="block mt-1 w-full" type="text" name="dni" :value="old('dni')" required
                             autofocus/>
            </div>

            <div class="mt-4">
                <x-jet-label for="nombres" value="{{ __('Name') }}"/>
                <x-jet-input id="nombres" class="block mt-1 w-full" type="text" name="nombres" :value="old('nombres')"
                             require/>
            </div>

            <div class="mt-4">
                <x-jet-label for="apellidos" value="{{ __('Apellidos') }}"/>
                <x-jet-input id="apellidos" class="block mt-1 w-full" type="text" name="apellidos"
                             :value="old('apellidos')" required/>
            </div>

            <div class="mt-4">
                <x-jet-label for="oficina" value="{{ __('Oficina') }}"/>
                <select name="oficina" id="oficina"
                        class="border-gray-300 focus:border-blue-300 focus:ring-3 focus:ring-blue-200 rounded shadow-sm w-full">
                    <option value="0">--Seleccione su oficina--</option>
                    {{--                    <option value="{{ $key }}" {{ (Input::old("title") == $key ? "selected":"") }}>{{ $val }}</option>--}}
                </select>
                <x-jet-input id="oficina" class="block mt-1 w-full" type="text" name="oficina"
                             :value="old('oficina')" required/>
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}"/>
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                             required/>
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}"/>
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required
                             autocomplete="new-password"/>
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}"/>
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password"
                             name="password_confirmation" required autocomplete="new-password"/>
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-between mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('¿Ya estás registrado?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
