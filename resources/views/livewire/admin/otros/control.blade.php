<div class="grid grid-cols-4 gap-6 relative">

    {{-- Controles --}}
    <div class="col-span-4 lg:col-span-1">
        <div class="p-4 flex flex-col bg-white rounded-lg text-gray-600 space-y-2">
            <x-side-item :active="$mostrar_escuelas" wire:click="cambiarVista(1)">
                {{ __('Escuelas') }}
            </x-side-item>

            <x-side-item :active="$mostrar_facultades" wire:click="cambiarVista(2)">
                {{ __('Facultades') }}
            </x-side-item>

            <div class="border-t border-gray-100"></div>

            {{--            <x-side-item wire:click="$set('vista_actual', 3)" active="{{ intval($vista_actual) === 3 }}">--}}
            {{--                Feel Inc--}}
            {{--            </x-side-item>--}}

        </div>
    </div>

    {{-- Vistas --}}
    <div class="col-span-4 lg:col-span-3">
        @if($mostrar_escuelas)
            @livewire('admin.otros.otros-escuelas')
        @endif
        @if($mostrar_facultades)
            @livewire('admin.otros.otros-facultades')
        @endif
    </div>

</div>
