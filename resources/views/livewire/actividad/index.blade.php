<div class="grid grid-cols-1 gap-y-4 lg:gap-y-0 lg:grid-cols-4 lg:gap-4 relative">

    <div class="flex flex-row lg:flex-col items-start gap-y-4">
        <form method="POST" action="#" class="w-10/12 mb-4">
            @csrf
            <div>

                <x-jet-input id="search" class="block mt-1 w-full" type="search" name="search" required/>
                <x-jet-label for="search" class="text-xs text-right text-gray-300"
                             value="{{ __('Búsqueda avanzada') }}"/>
            </div>
        </form>
        <x-side-item :active="$show_mis_actividades" wire:click="cambiarVista(1)">
            @slot('icon')
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75"
                          d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                </svg>
            @endslot
            {{ __('Mis actividades') }}
        </x-side-item>

        <x-side-item :active="$show_proveer" wire:click="cambiarVista(2)">
            @slot('icon')
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75"
                          d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                </svg>
            @endslot
            {{ __('Información a proveer') }}
        </x-side-item>

        <x-side-item :active="$show_documentos_recibidos" wire:click="cambiarVista(3)">
            @slot('icon')
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75"
                          d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"/>
                </svg>
            @endslot
            {{ __('Documentos recibidos') }}
        </x-side-item>

    </div>

    <div class="col-span-3">
        {{-- 1: Mis Actividades --}}
        @if ($show_mis_actividades)
            @livewire('actividad.actividades-incompletas')
        @endif

        {{-- 2: Informacion a proveer --}}
        @if ($show_proveer)
            @livewire('actividad.proveer')
        @endif

        {{-- 3: Documentos recibidos --}}
        @if ($show_documentos_recibidos)
            @livewire('actividad.documentos-recibidos')
        @endif

    </div>


</div>
