<x-jet-dropdown align="left" width="48">
    <x-slot name="trigger">
        <x-button-void class="py-2 px-4 text-xs">
            Indicadores de otros procesos
            <svg class="ml-1 -mr-0.5 h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" clip-rule="evenodd"
                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/>
            </svg>
        </x-button-void>
    </x-slot>

    <x-slot name="content">
        @foreach( $procesos as $proceso )
            @if($proceso->indicadores_count)
                <x-jet-dropdown-link
                    href="{{ route('indicadores.indicadores', [$proceso->id, str_replace(' ', '_', $proceso->nombre)]) }}">
                    {{ $proceso->nombre }}
                </x-jet-dropdown-link>
            @endif
        @endforeach
    </x-slot>
</x-jet-dropdown>
