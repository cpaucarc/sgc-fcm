<div>
    {{--    Contador y creacion de nueva instancia--}}
    <div class="flex justify-between items-center mb-6">

        <div>
            <h3 class="ml-1 text-gray-600 font-bold text-lg">
                Hay
                <span class="text-gray-800 mx-1">{{ $indicador->analisis->count() }}</span>
                analisis de este indicador
            </h3>
        </div>

        {{-- INICIO Botones para crear nueva instancia de indicador --}}
        {{--        <x-indicador.crear-instancia :codigo="$indicador->cod_ind_inicial" :id="$indicador->id"/>--}}
        @livewire('indicador.nueva-medicion', [ 'indicador' => $indicador->id ])
        {{-- FIN    Botones para crear nueva instancia de indicador --}}

    </div>

    @if($indicador->analisis->count())
        {{--    Tabla historica--}}
        <x-table>
            <x-slot name="head">
                <tr>
                    <x-table.heading class="text-center">Periodo</x-table.heading>
                    @if($indicador->titulo_interes)
                        <x-table.heading class="text-center">{{ $indicador->titulo_interes }}</x-table.heading>
                    @endif
                    @if($indicador->titulo_total)
                        <x-table.heading class="text-center">{{ $indicador->titulo_total }}</x-table.heading>
                    @endif
                    <x-table.heading class="text-center">{{ $indicador->titulo_resultado }}</x-table.heading>
                    <x-table.heading class="text-center">Minimo</x-table.heading>
                    <x-table.heading class="text-center">Satisfactorio</x-table.heading>
                    <x-table.heading class="text-center">Sobresaliente</x-table.heading>
                    <x-table.heading class="text-center"><span class="sr-only">Acciones</span></x-table.heading>
                </tr>
            </x-slot>

            <x-slot name="body">
                @foreach($indicador->analisis as $i => $analisis)
                    <x-table.row :odd="$loop->odd">
                        <x-table.cell class="text-center">
                            <h4 class="text-sm text-gray-500">
                                Desde {{ $analisis->fecha_medicion_inicio->format('d-M-Y') }}
                            </h4>
                            <h4>
                                Hasta {{ $analisis->fecha_medicion_fin->format('d-M-Y') }}
                            </h4>
                        </x-table.cell>
                        @if($analisis->interes)
                            <x-table.cell class="text-center">{{ $analisis->interes }}</x-table.cell>
                        @endif
                        @if($analisis->total)
                            <x-table.cell class="text-center">{{ $analisis->total }}</x-table.cell>
                        @endif
                        <x-table.cell class="text-center font-black">
                            {{ $analisis->resultado }}
                            @if($analisis->interes){{ __('%') }}@endif
                        </x-table.cell>
                        <x-table.cell class="text-center">
                            {{ round($analisis->minimo, 1) }}
                            @if($analisis->interes){{ __('%') }}@endif
                        </x-table.cell>
                        <x-table.cell class="text-center">
                            {{ round($analisis->satisfactorio, 1) }}
                            @if($analisis->interes){{ __('%') }}@endif
                        </x-table.cell>
                        <x-table.cell class="text-center">
                            {{ round($analisis->sobresaliente, 1) }}
                            @if($analisis->interes){{ __('%') }}@endif
                        </x-table.cell>
                        <x-table.cell class="inline-flex justify-end">
                            <x-button.invisible color="purple" wire:click="verAnalisis({{ $analisis->id }})">
                                <x-icons.open-modal class="h-4 w-4" stroke="1.25"></x-icons.open-modal>
                            </x-button.invisible>
                            @if($analisis->created_at->diffInDays(now()) < 7)
                                {{--                            {{ $analisis->created_at->diffInDays(now()) }}--}}
                                <x-button.invisible color="orange" wire:click="editarAnalisis({{ $analisis->id }})">
                                    <x-icons.edit class="h-4 w-4" stroke="1.25"></x-icons.edit>
                                </x-button.invisible>
                            @endif
                        </x-table.cell>
                    </x-table.row>
                @endforeach
            </x-slot>
        </x-table>

        <div class="py-4">
            @livewire('indicador.grafico', [ 'indicador' => $indicador->id ])
        </div>
    @else
        <x-message-image
            image="{{ asset('images/ilustraciones/sin_indicadores_medidos.svg') }}"
            title="Este indicador aún no tiene ninguna medición"
            description="Comienze a crear mediciones según la frecuencia de medición establecido."></x-message-image>
    @endif

    @if(!is_null($analisis_seleccionado))
        <x-jet-dialog-modal wire:model="abrir" maxWidth="4xl">

            <x-slot name="title">
                <span></span>
                <button wire:click="$set('abrir', false)" class="text-gray-400 hover:text-gray-500">
                    <x-icons.x :stroke="1.5" class="h-5 w-5"></x-icons.x>
                </button>
            </x-slot>

            <x-slot name="content">

                <div class="mb-4">
                    <h2 class="font-bold text-lg text-gray-500">
                        {{ $analisis_seleccionado->indicador->objetivo }}
                    </h2>
                </div>

                <div class="mb-6 flex justify-between items-center space-x-6">
                    <div class="rounded border border-gray-200 text-center text-gray-700 w-full px-4 py-2">
                        <h3 class="text-gray-500">{{ __('Mínimo') }}</h3>
                        {{ round($analisis_seleccionado->minimo, 1) }}
                        @if($analisis_seleccionado->interes){{ __('%') }}@endif
                    </div>
                    <div class="rounded border border-gray-200 text-center text-gray-700 w-full px-4 py-2">
                        <h3 class="text-gray-500">{{ __('Satisfactorio') }}</h3>
                        {{ round($analisis_seleccionado->satisfactorio, 1) }}
                        @if($analisis_seleccionado->interes){{ __('%') }}@endif
                    </div>
                    <div class="rounded border border-gray-200 text-center text-gray-700 w-full px-4 py-2">
                        <h3 class="text-gray-500">{{ __('Sobresaliente') }}</h3>
                        {{ round($analisis_seleccionado->sobresaliente, 1) }}
                        @if($analisis_seleccionado->interes){{ __('%') }}@endif
                    </div>
                </div>

                <div class="mb-4">
                    <h2 class="font-bold text-gray-500 mb-2">
                        El análisis se realizó
                        desde el <span
                            class="font-black text-gray-700">{{ $analisis_seleccionado->fecha_medicion_inicio->format('d/M/Y') }}</span>
                        hasta el <span
                            class="font-black text-gray-700">{{ $analisis_seleccionado->fecha_medicion_fin->format('d/M/Y') }}</span>
                    </h2>
                    <div class="flex justify-between items-center space-x-6">
                        <div class="rounded border border-gray-200 text-center text-gray-700 w-full px-4 py-2">
                            <h3 class="text-gray-500">{{ $analisis_seleccionado->indicador->titulo_interes }}</h3>
                            {{ round($analisis_seleccionado->interes, 1) }}
                        </div>
                        <div class="rounded border border-gray-200 text-center text-gray-700 w-full px-4 py-2">
                            <h3 class="text-gray-500">{{ $analisis_seleccionado->indicador->titulo_total }}</h3>
                            {{ round($analisis_seleccionado->total, 1) }}
                        </div>
                        <div
                            class="rounded border border-gray-200 font-bold text-lg text-center w-full px-4 py-2 {{ $analisis_seleccionado->resultado <= $analisis_seleccionado->minimo ? 'text-red-600' : ($analisis_seleccionado->resultado <= $analisis_seleccionado->satisfactorio ? 'text-yellow-600' : ($analisis_seleccionado->resultado <= $analisis_seleccionado->sobresaliente ? 'text-green-600' : 'text-blue-600')) }}">
                            <h3 class="text-gray-500 font-normal text-base">{{ $analisis_seleccionado->indicador->titulo_resultado }}</h3>
                            {{ round($analisis_seleccionado->resultado, 1) }}
                            @if($analisis_seleccionado->interes){{ __('%') }}@endif
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <div class="mb-2">
                        <h3 class="font-bold text-gray-700">Interpretación</h3>
                        <p class="text-gray-500">
                            {{ $analisis_seleccionado->interpretacion ?? 'Ninguno' }}
                        </p>
                    </div>
                    <div class="mb-2">
                        <h3 class="font-bold text-gray-700">Observación</h3>
                        <p class="text-gray-500">
                            {{ $analisis_seleccionado->observacion ?? 'Ninguno' }}
                        </p>
                    </div>
                </div>

                <div class="mb-4">
                    <div class="mb-2">
                        <h3 class="font-bold text-gray-700">Elaborado por:
                            <span
                                class="font-normal text-gray-600">
                                {{ $analisis_seleccionado->elaborado_por ?? 'No Especificado' }}
                            </span>
                        </h3>
                    </div>
                    <div class="mb-2">
                        <h3 class="font-bold text-gray-700">Revisado por:
                            <span class="font-normal text-gray-600">
                                {{ $analisis_seleccionado->revisado_por ?? 'No Especificado' }}
                            </span>
                        </h3>
                    </div>
                    <div class="mb-2">
                        <h3 class="font-bold text-gray-700">Aprobado por:
                            <span class="font-normal text-gray-600">
                                {{ $analisis_seleccionado->aprobado_por ?? 'No Especificado' }}
                            </span>
                        </h3>
                    </div>
                </div>
            </x-slot>
        </x-jet-dialog-modal>
    @endif

    @if(!is_null($analisis_a_editar))
        <x-jet-dialog-modal wire:model="abrirEditar">

            <x-slot name="title">
                <h1 class="font-bold">
                    Editar información del análisis
                </h1>
                <button wire:click="$set('abrirEditar', false)" class="text-gray-400 hover:text-gray-500">
                    <x-icons.x :stroke="1.5" class="h-5 w-5"></x-icons.x>
                </button>
            </x-slot>

            <x-slot name="content">

                <div class="flex space-x-4 justify-between items-center mb-4">
                    <label>
                        Mínimo
                        <input type="text" wire:model.defer="minimo" autocomplete="off"
                               class="input-form w-full col-span-2">
                    </label>
                    <label>
                        Satisfactorio
                        <input type="text" wire:model.defer="satisfactorio" autocomplete="off"
                               class="input-form w-full col-span-2">
                    </label>
                    <label>
                        Sobresaliente
                        <input type="text" wire:model.defer="sobresaliente" autocomplete="off"
                               class="input-form w-full col-span-2">
                    </label>
                </div>
                <label class="mb-4">
                    Interpretación
                    <textarea rows="5" class="w-full input-form text-sm" wire:model.defer="interpretacion"></textarea>
                </label>
                <label class="mb-4">
                    Observación
                    <textarea rows="5" class="w-full input-form text-sm" wire:model.defer="observacion"></textarea>
                </label>
                <div class="flex space-x-4 justify-between items-center">
                    <label>
                        Elaborado por
                        <input type="text" wire:model.defer="elaborado_por" autocomplete="off"
                               class="input-form w-full">
                    </label>
                    <label>
                        Revisado por
                        <input type="text" wire:model.defer="revisado_por" autocomplete="off"
                               class="input-form w-full">
                    </label>
                    <label>
                        Aprobado por
                        <input type="text" wire:model.defer="aprobado_por" autocomplete="off"
                               class="input-form w-full">
                    </label>
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$set('abrirEditar', false)">
                    Cerrar
                </x-jet-secondary-button>

                <x-jet-button
                    wire:click="guardarAnalisisEditado"
                    wire:target="guardarAnalisisEditado"
                    wire:loading.class="bg-gray-800"
                    wire:loading.attr="disabled">
                    <x-icons.load class="h-4 w-4" wire:loading wire:target="guardarAnalisisEditado"></x-icons.load>
                    {{ __('Guardar') }}
                </x-jet-button>
            </x-slot>
        </x-jet-dialog-modal>
    @endif
</div>
