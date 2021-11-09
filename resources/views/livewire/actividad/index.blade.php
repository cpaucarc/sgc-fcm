<div class="grid grid-cols-1 gap-y-4 lg:gap-y-0 lg:grid-cols-4 lg:gap-4 relative items-start">

    <div class="flex flex-row lg:flex-col items-start gap-4 bg-white p-3 rounded-lg">
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

    <div class="col-span-3 space-y-4">

        <div class="border rounded-lg flex justify-between">

            <div class="bg-white rounded-l-lg py-3 px-4">
                <label
                    class="ml-2 flex flex-col whitespace-nowrap text-gray-700 font-bold w-28 flex-shrink-0">
                    Ciclo
                    <select wire:model="ciclo_seleccionado"
                            class="input-form-none text-lg font-bold text-purple-700 w-full cursor-pointer">
                        @if(!is_null($ciclos))
                            @foreach($ciclos as $ciclo)
                                <option class="text-gray-700 text-base"
                                        value="{{ $ciclo->id }}">{{ $ciclo->nombre }}</option>
                            @endforeach
                        @else
                            <option class="text-gray-700 text-base" value="0">No hay ningún ciclo registrado</option>
                        @endif
                    </select>
                </label>
            </div>

            <div class="block w-full px-6 py-2 bg-white rounded-r-lg">
                <x-simple-progress
                    percent="{{$conteo->completado === 0 ? 0 : ($conteo->completado / $conteo->total * 100)}}"
                    color="{{$conteo->color}}">
                    {{$conteo->msg}}:
                    <span class="font-bold">{{ $conteo->completado }}</span> de
                    <span class="font-bold">{{ $conteo->total }}</span>
                </x-simple-progress>
            </div>
        </div>

        {{-- 1: Mis Actividades --}}
        @if ($show_mis_actividades)
            @livewire('actividad.actividades-incompletas', ['ciclo_id' => $ciclo_seleccionado, 'responsable_id' =>
            $responsable_id])
        @endif

        {{-- 2: Informacion a proveer --}}
        @if ($show_proveer)
            @livewire('actividad.proveer', ['ciclo_id' => $ciclo_seleccionado, 'entidad_id' =>
            $entidad_id])
        @endif

        {{-- 3: Documentos recibidos --}}
        @if ($show_documentos_recibidos)
            @livewire('actividad.documentos-recibidos', ['ciclo_id' => $ciclo_seleccionado, 'entidad_id' =>
            $entidad_id])
        @endif
    </div>

    @push('js')
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Livewire.on('guardado', msg => {
                Swal.fire({
                    icon: 'success',
                    title: '',
                    text: msg,
                });
            });
            Livewire.on('error', msg => {
                Swal.fire({
                    icon: 'error',
                    title: '',
                    text: msg,
                });
            });
        </script>
    @endpush

</div>
