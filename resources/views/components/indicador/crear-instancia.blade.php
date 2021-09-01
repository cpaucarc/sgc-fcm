<div>
    @if( $indicador->cod_ind_inicial === 'IND-048' )
        @livewire('rrss.indicador.ind48', ['indicador' => $indicador->id])
    @elseif( $indicador->cod_ind_inicial === 'IND-049' )
        @livewire('rrss.indicador.ind49', ['indicador' => $indicador->id])
    @elseif( $indicador->cod_ind_inicial === 'IND-050' )
        @livewire('rrss.indicador.ind50', ['indicador' => $indicador->id])
    @elseif( $indicador->cod_ind_inicial === 'IND-051' )
        @livewire('rrss.indicador.ind51', ['indicador' => $indicador->id])
    @elseif( $indicador->cod_ind_inicial === 'IND-052' )
        @livewire('rrss.indicador.ind52', ['indicador' => $indicador->id])
    @else
        @livewire('rrss.indicador.ind53', ['indicador' => $indicador->id])
    @endif
</div>
