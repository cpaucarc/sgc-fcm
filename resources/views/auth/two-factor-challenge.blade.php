<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo></x-jet-authentication-card-logo>
        </x-slot>

        <div x-data="{ recovery: false }">
            <div class="mb-4 text-sm text-gray-600" x-show="! recovery">
                {{ __('Confirme el acceso a su cuenta ingresando el código de autenticación proporcionado por su aplicación de autenticación.') }}
            </div>

            <div class="mb-4 text-sm text-gray-600" x-show="recovery">
                {{ __('Confirme el acceso a su cuenta ingresando uno de sus códigos de recuperación de emergencia.') }}
            </div>

            <x-jet-validation-errors class="mb-4"></x-jet-validation-errors>

            <form method="POST" action="{{ route('two-factor.login') }}">
                @csrf

                <div class="mt-4" x-show="! recovery">
                    <x-jet-label for="code" value="{{ __('Código') }}"></x-jet-label>
                    <x-jet-input id="code" class="block mt-1 w-full" type="text" inputmode="numeric" name="code"
                                 autofocus x-ref="code" autocomplete="one-time-code"></x-jet-input>
                </div>

                <div class="mt-4" x-show="recovery">
                    <x-jet-label for="recovery_code" value="{{ __('Código de Recuperación') }}"></x-jet-label>
                    <x-jet-input id="recovery_code" class="block mt-1 w-full" type="text" name="recovery_code"
                                 x-ref="recovery_code" autocomplete="one-time-code"></x-jet-input>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <button type="button" class="text-sm text-gray-600 hover:text-gray-900 underline cursor-pointer"
                            x-show="! recovery"
                            x-on:click="
                                        recovery = true;
                                        $nextTick(() => { $refs.recovery_code.focus() })
                                    ">
                        {{ __('Usar un Código de Recuperación') }}
                    </button>

                    <button type="button" class="text-sm text-gray-600 hover:text-gray-900 underline cursor-pointer"
                            x-show="recovery"
                            x-on:click="
                                        recovery = false;
                                        $nextTick(() => { $refs.code.focus() })
                                    ">
                        {{ __('Usa un Código de Autenticación') }}
                    </button>

                    <x-jet-button class="ml-4">
                        {{ __('Iniciar Sesión') }}
                    </x-jet-button>
                </div>
            </form>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
