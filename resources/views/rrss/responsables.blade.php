<x-app-layout>

    <div class="flex justify-between items-start mb-4">
        <h2 class="font-bold text-2xl text-gray-600">
            Lista de mis RSU
        </h2>
        <a href="{{ route('rrss.registro') }}"
           class="flex-shrink-0 inline-flex items-center px-3 py-1 bg-blue-700 border border-transparent rounded font-semibold text-white tracking-wide hover:bg-blue-800 active:bg-blue-800 focus:outline-none focus:border-blue-800 focus:ring focus:ring-blue-200 disabled:opacity-25 transition">
            <x-icons.plus class="h-6 w-6 mr-1" stroke="1.5"></x-icons.plus>
            {{ __('Nuevo') }}
        </a>
    </div>

    @livewire('rrss.listar-rrss-responsable')

</x-app-layout>
