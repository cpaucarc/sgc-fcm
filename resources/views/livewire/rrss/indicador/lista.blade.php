<div>
    <div class="flex items-center justify-end gap-x-2">

        <span class="font-semibold text-gray-400">
            Ir a otros indicadores:
        </span>

        @foreach($lista as $item)
            <x-jet-dropdown align="right" width="32">
                <x-slot name="trigger">
                    <x-button-void class="py-1 px-2 text-xs">
                        {{ $item['nombre'] }}

                        <svg class="ml-2 -mr-0.5 h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/>
                        </svg>
                    </x-button-void>
                </x-slot>

                <x-slot name="content">
                    @foreach($item['items'] as $it)
                        <x-jet-dropdown-link href="{{ route('rrss.indicador', $it->id) }}">
                            {{ $it->cod_ind_inicial }}
                        </x-jet-dropdown-link>
                    @endforeach
                </x-slot>
            </x-jet-dropdown>
        @endforeach

    </div>
</div>
