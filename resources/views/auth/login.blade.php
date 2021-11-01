<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo></x-jet-authentication-card-logo>
        </x-slot>

        <x-jet-validation-errors class="mb-4"></x-jet-validation-errors>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Correo Electronico') }}"></x-jet-label>
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                             required autofocus></x-jet-input>
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Contraseña') }}"></x-jet-label>
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required
                             autocomplete="current-password"></x-jet-input>
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember"></x-jet-checkbox>
                    <span class="ml-2 text-sm text-gray-500">{{ __('Recordar mi sesión') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-center mt-12">
                <x-jet-button class="tracking-wide px-6 rounded-lg">
                    {{ __('Iniciar Sesión') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
