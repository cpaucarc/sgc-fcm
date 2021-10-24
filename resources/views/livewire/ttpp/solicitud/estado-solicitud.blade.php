<div>

    @if( $estado->count())
        <div class="rounded-lg px-4 py-2 text-sm text-{{ $estado[0]->color }}-900 bg-{{ $estado[0]->color }}-200">
            Solicitud <span class="uppercase font-bold">{{ $estado[0]->nombre }}</span>
        </div>
    @else
        <div class="rounded-lg px-4 py-2 text-gray-900 bg-gray-50 text-center">
            <p class="font-bold">
                No hay ninguna solicitud
            </p>
        </div>
    @endif

</div>
