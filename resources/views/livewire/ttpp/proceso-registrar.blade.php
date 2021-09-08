<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    @if ($paso1)
        @livewire('ttpp.registrar-ttpp')
    @endif

    @if ($paso2 and $ttpp_id > 0)
        @livewire('ttpp.registrar-participantes', ['ttpp_id' => $ttpp_id])
    @endif

</div>
