<x-app-layout>

    <div class="space-y-4">

        {{-- Lista de indicadores --}}
        @livewire('rrss.indicador.lista', [ 'indicador' => $indicador->id ])

        {{--    Cabecera: Datos generales del indicador--}}
        <x-indicador.header :indicador="$indicador"/>

        <x-card>
            @livewire('rrss.indicador.tabla-analisis', [ 'indicador' => $indicador->id ])
        </x-card>

    </div>

</x-app-layout>
