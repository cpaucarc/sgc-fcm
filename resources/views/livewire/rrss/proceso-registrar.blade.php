<div>

    @if($paso1)
        @livewire('rrss.registrar-rrss')
    @endif

    @if($paso2 and $rrss_id > 0)
        @livewire('rrss.registrar-participantes', ['rrss_id' => $rrss_id])
    @endif

</div>
