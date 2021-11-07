<x-app-layout>

    <div class="text-gray-800 mb-10">
        <h3 class="text-xl font-thin">
            Indicadores del proceso de
        </h3>
        <h2 class="font-bold text-4xl">
            {{ $proceso->nombre }}
        </h2>
    </div>

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
                        @forelse($item['items'] as $it)
                            <div class="col-span-1 lg:col-span-2 flex justify-between">
                                <x-indicador.ind-min :indicador="$it" :route="'rrss.indicador'"></x-indicador.ind-min>
                            </div>
                        @empty
                            <x-message-image image="{{ asset('images/ilustraciones/sin_indicadores.svg') }}"
                                             title="" description="No existen indicadores de este nivel">
                            </x-message-image>
                        @endforelse
                    </div>
                </x-card>
            </div>
        @endforeach
    </div>

</x-app-layout>
