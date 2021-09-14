<div>
    {{-- ToDo: Investigacion --}}
    @if( $codigo === 'IND-044' )
        @livewire('indicador.investigacion.ind44', ['indicador' => $id])
    @elseif( $codigo === 'IND-045' )
        @livewire('indicador.investigacion.ind45', ['indicador' => $id])
    @elseif( $codigo === 'IND-046' )
        @livewire('indicador.investigacion.ind46', ['indicador' => $id])
    @elseif( $codigo === 'IND-047' )
        @livewire('indicador.investigacion.ind47', ['indicador' => $id])

        {{-- ToDo: RSU --}}
    @elseif( $codigo === 'IND-048' )
        @livewire('indicador.rsu.ind48', ['indicador' => $id])
    @elseif( $codigo === 'IND-049' )
        @livewire('indicador.rsu.ind49', ['indicador' => $id])
    @elseif( $codigo === 'IND-050' )
        @livewire('indicador.rsu.ind50', ['indicador' => $id])
    @elseif( $codigo === 'IND-051' )
        @livewire('indicador.rsu.ind51', ['indicador' => $id])
    @elseif( $codigo === 'IND-052' )
        @livewire('indicador.rsu.ind52', ['indicador' => $id])
    @elseif( $codigo === 'IND-053' )
        @livewire('indicador.rsu.ind53', ['indicador' => $id])

        {{-- ToDo: Bachiller --}}
    @elseif( $codigo === 'IND-058' )
        {{--        @livewire('indicador.bachiller.ind58', ['indicador' => $id])--}}
        @livewire('indicador.nueva-medicion', [
        'indicador' => 28,
        'interes' => 24,
        'total' => 21,
        'resultado' => 12
        ])
    @endif

</div>
