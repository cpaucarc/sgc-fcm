<x-app-layout>

    <div class="space-y-6">

        {{-- Lista de indicadores --}}
        <div class="flex items-center justify-between gap-x-2">
            <x-indicador.dropdown-procesos :procesos="$procesos"></x-indicador.dropdown-procesos>
            @livewire('indicador.lista', [ 'indicador' => $indicador->id ])
        </div>

        {{-- Cabecera: Datos generales del indicador--}}
        <x-indicador.header :indicador="$indicador"></x-indicador.header>

        {{-- Tabla y Grafico --}}
        <x-card>
            @livewire('indicador.tabla-analisis', [ 'indicador' => $indicador->id ])
        </x-card>

    </div>

</x-app-layout>
