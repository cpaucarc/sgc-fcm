<div class="grid grid-cols-4 gap-6 relative">

    {{-- Controles --}}
    <div class="col-span-4 lg:col-span-1">
        <div class="p-4 flex flex-col bg-white rounded-lg text-gray-600 space-y-2">

            <x-side-item wire:key="1" :active="$mostrar_escuelas" wire:click="cambiarVista(1)">
                {{ __('Escuelas') }}
            </x-side-item>

            <x-side-item wire:key="2" :active="$mostrar_facultades" wire:click="cambiarVista(2)">
                {{ __('Facultades') }}
            </x-side-item>

            <div class="border-t border-gray-100"></div>

            <x-side-item wire:key="3" :active="$mostrar_entradas" wire:click="cambiarVista(3)">
                {{ __('Entradas') }}
            </x-side-item>
            <x-side-item wire:key="4" :active="$mostrar_salidas" wire:click="cambiarVista(4)">
                {{ __('Salidas') }}
            </x-side-item>
            <x-side-item wire:key="5" :active="$mostrar_actividades" wire:click="cambiarVista(5)">
                {{ __('Actividades') }}
            </x-side-item>

        </div>
    </div>

    {{-- Vistas --}}
    <div class="col-span-4 lg:col-span-3">
        @if($mostrar_escuelas)
            @livewire('admin.otros.otros-escuelas')
        @elseif($mostrar_facultades)
            @livewire('admin.otros.otros-facultades')
        @elseif($mostrar_entradas)
            @livewire('admin.otros.otros-entradas')
        @elseif($mostrar_salidas)
            @livewire('admin.otros.otros-salidas')
        @elseif($mostrar_actividades)
            @livewire('admin.otros.otros-actividades')
        @endif
    </div>

</div>
