<x-jet-dropdown align="left" width="48">
    <x-slot name="trigger">
        <x-button-void class="py-2 px-4 text-xs">
            Indicadores de otros procesos
            <x-icons.dropdown :stroke="1.25" class="ml-1 -mr-0.5 h-4 w-4"/>
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
