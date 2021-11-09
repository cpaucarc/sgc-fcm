<div>
    @if ($vacantes[0]->vacantes > 0 and $vacantes[0]->fecha_fin >= $fechaHoy)
        <div class="rounded-lg px-4 py-2 text-sm text-yellow-900 bg-yellow-200">
            Vacantes disponibles <span class="uppercase font-bold">{{ $vacantes[0]->vacantes }}</span>,
            tramites desde <span class="uppercase font-bold">[{{ $vacantes[0]->fecha_inicio }}]</span> hasta <span
                class="uppercase font-bold">[{{ $vacantes[0]->fecha_fin }}]</span>
        </div>
    @else
        <div class="rounded-lg px-4 py-2 text-red-600 bg-gray-50 text-center">
            <p class="font-bold">
                Vacantes agotados, tramites desde <span
                    class="uppercase font-bold">[{{ $vacantes[0]->fecha_inicio }}]</span> hasta <span
                    class="uppercase font-bold">[{{ $vacantes[0]->fecha_fin }}]</span>
            </p>
        </div>
    @endif
</div>
