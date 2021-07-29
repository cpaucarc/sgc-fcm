<div class="grid grid-cols-1 gap-y-4 lg:gap-y-0 lg:grid-cols-4 lg:gap-4 ">

    <div class="flex flex-col items-start gap-y-4">

        <x-side-item :active="$show_mis_actividades" wire:click="cambiarVista(1)">
            {{ __('Mis actividades') }}
        </x-side-item>

        <x-side-item :active="$show_proveer" wire:click="cambiarVista(2)">
            {{ __('Información a proveer') }}
        </x-side-item>

        <x-side-item :active="$show_documentos_recibidos" wire:click="cambiarVista(3)">
            {{ __('Documentos recibidos') }}
        </x-side-item>

    </div>

    <div class="col-span-3">
        {{-- 1: Mis Actividades--}}
        @if($show_mis_actividades)
            @livewire('actividad.actividades-incompletas')
        @endif

        {{-- 2: Informacion a proveer--}}
        @if($show_proveer)
            @livewire('actividad.proveer')
        @endif

        {{-- 3: Documentos recibidos--}}
        @if($show_documentos_recibidos)
            @livewire('actividad.documentos-recibidos')
        @endif

    </div>


</div>
