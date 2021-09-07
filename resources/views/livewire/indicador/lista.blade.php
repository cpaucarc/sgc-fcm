<div class="inline-flex items-center gap-x-2">
        <span class="font-semibold text-gray-500 text-sm">
            Otros indicadores de este proceso:
        </span>

    @foreach($lista as $item)
        <x-jet-dropdown align="right" width="32">
            <x-slot name="trigger">
                <x-button-void class="py-2 px-4 text-xs">
                    {{ $item['nombre'] }}
                    <x-icons.dropdown :stroke="1.25" class="ml-1 -mr-0.5 h-4 w-4"/>
                </x-button-void>
            </x-slot>

            <x-slot name="content">
                @foreach($item['items'] as $it)
                    <x-jet-dropdown-link
                        href="{{ route('indicadores.indicador', [$it->id, $it->cod_ind_inicial]) }}">
                        {{ $it->cod_ind_inicial }}
                    </x-jet-dropdown-link>
                @endforeach
            </x-slot>
        </x-jet-dropdown>
    @endforeach

</div>
