<div class="grid grid-cols-1 gap-y-6 lg:gap-y-0 lg:grid-cols-4 lg:gap-6 relative items-start">

    <div class="flex flex-row lg:flex-col items-start gap-4 bg-white p-3 rounded-lg">
        <x-side-item :active="$show_mis_actividades" wire:click="cambiarVista(1)">
            @slot('icon')
                <x-icons.clipboard class="h-5 w-5"></x-icons.clipboard>
            @endslot
            {{ __('Mis actividades') }}
        </x-side-item>

        <x-side-item :active="$show_proveer" wire:click="cambiarVista(2)">
            @slot('icon')
                <x-icons.upload class="h-5 w-5"></x-icons.upload>
            @endslot
            {{ __('Información a proveer') }}
        </x-side-item>

        <x-side-item :active="$show_documentos_recibidos" wire:click="cambiarVista(3)">
            @slot('icon')
                <x-icons.download class="h-5 w-5"></x-icons.download>
            @endslot
            {{ __('Documentos recibidos') }}
        </x-side-item>
    </div>

    <div class="col-span-3 space-y-6">

        <div class="border rounded-lg flex justify-between">

            <div class="bg-white rounded-l-lg py-3 px-4">
                <label
                    class="ml-2 flex flex-col whitespace-nowrap text-gray-700 font-bold w-28 flex-shrink-0">
                    Ciclo
                    <select wire:model="ciclo_seleccionado"
                            class="input-form-none text-lg font-bold text-indigo-700 w-full cursor-pointer">
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
