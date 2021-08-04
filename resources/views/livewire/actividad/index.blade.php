<div class="grid grid-cols-1 gap-y-4 lg:gap-y-0 lg:grid-cols-4 lg:gap-4 relative">

    <div class="flex flex-row lg:flex-col items-start gap-y-4">
        <form method="POST" action="" class="w-10/12 mb-4">
            @csrf
            <div>

                <x-jet-input id="search" class="block mt-1 w-full" type="search" name="search"  required />
                <x-jet-label for="search" class="text-xs text-right text-gray-300"
                    value="{{ __('Búsqueda avanzada') }}" />
            </div>
        </form>
        <x-side-item :active="$show_mis_actividades" wire:click="cambiarVista(1)">
            @slot('icon')
                <i class="fas fa-file-invoice"></i>
            @endslot
            {{ __('Mis actividades') }}
        </x-side-item>

        <x-side-item :active="$show_proveer" wire:click="cambiarVista(2)">
            @slot('icon')
                <i class="fas fa-file-import"></i>
            @endslot
            {{ __('Información a proveer') }}
        </x-side-item>

        <x-side-item :active="$show_documentos_recibidos" wire:click="cambiarVista(3)">
            @slot('icon')
                <i class="fas fa-file-export"></i>
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
