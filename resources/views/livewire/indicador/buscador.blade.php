<div class="max-w-4xl relative">
    <x-input-search
        class="w-full" autocomplete="false"
        wire:model.debounce.500ms="query"
        wire:keydown.escape="resetear"
        wire:keydown.tab="resetear"
    >
    </x-input-search>

    <div wire:loading class="absolute -mt-2 p-4 w-full shadow space-y-4 bg-white rounded-b-md border border-gray-200">
        <p class="text-gray-600">
            Buscando...
        </p>
    </div>

    @if( !empty($query) )
        <div class="fixed top-0 right-0 bottom-0 left-0" wire:click="resetear"></div>

        <div class="absolute -mt-2 w-full shadow bg-white rounded-b-md border border-gray-200">
            @if( !empty($indicadores) )
                @foreach($indicadores as $indicador)
                    <div class="px-4 py-2 bg-transparent text-gray-600 hover:bg-gray-100 hover:text-gray-800">
                        <a href="{{ route('indicadores.indicador', [$indicador->id, $indicador->cod_ind_inicial]) }}">

                            <x-tooltip>
                                <x-slot name="message">
                                    {{ $indicador->objetivo }}
                                </x-slot>

                                <div class="flex items-center justify-between text-sm">
                                    <span class="font-semibold mr-4">
                                        {{ $indicador->cod_ind_inicial }}
                                    </span>

                                    @if($indicador->escuela)
                                        {{ $indicador->escuela->nombre }}
                                    @else
                                        {{ __('Facultad') }}
                                    @endif

                                </div>

                            </x-tooltip>

                        </a>
                    </div>
                @endforeach
            @else
                <p class="px-2 py-1">
                    No hay resultados
                </p>
            @endif
        </div>
    @endif
</div>
