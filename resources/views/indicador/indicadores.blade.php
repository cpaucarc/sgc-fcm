<x-app-layout>

    <x-card class="bg-blue-700 mb-6 py-2">
        <h1 class="text-blue-100 text-xl font-thin">
            Indicadores del proceso de
            <span class="text-white font-extrabold tracking-wide">{{ $proceso->nombre }}</span>
        </h1>
    </x-card>

    <div class="grid grid-cols-3 gap-6">
        @foreach($lista as $item)
            <div class="col-span-3 lg:col-span-1">
                <x-card>
                    <x-slot name="header">
                        <h2 class="font-bold text-gray-800">
                            Indicadores de {{ $item['nombre'] }}
                        </h2>
                    </x-slot>

                    <div class="grid grid-cols-2 gap-6">
                        @foreach($item['items'] as $it)
                            <div class="col-span-1 lg:col-span-2 flex justify-between">
                                <x-indicador.ind-min :indicador="$it" :route="'rrss.indicador'"/>
                            </div>
                        @endforeach
                    </div>
                </x-card>
            </div>
        @endforeach
    </div>

</x-app-layout>
