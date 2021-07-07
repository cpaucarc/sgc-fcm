<x-guest-layout>

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

    @livewire('registro.registrar')

</x-guest-layout>
