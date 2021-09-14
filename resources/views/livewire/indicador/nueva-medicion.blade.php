<div>
    <x-jet-button wire:click="$set('mostrar', true)">
        <x-icons.plus :stroke="2" class="h-6 w-6 mr-2"></x-icons.plus>
        Crear nuevo
    </x-jet-button>

    @if($indicador)
        <x-jet-dialog-modal wire:model="mostrar" maxWidth="4xl">
            <x-slot name="title">
                <div></div>

                <button wire:click="$set('mostrar', false)" class=" text-gray-600 hover:text-gray-800">
                    <x-icons.x :stroke="1.5" class="h-5 w-5"></x-icons.x>
                </button>
            </x-slot>
            <x-slot name="content">

                <div class="space-y-6">
                    {{-- Fechas de medicion --}}
                    <div class="bg-gray-100 py-3 px-6 text-gray-800 rounded-lg flex items-center justify-between">

                        <div class="whitespace-nowrap flex items-center">
                            <x-icons.info :stroke="1.5" class="h-6 w-6 mr-2"></x-icons.info>
                            Medición <span class="font-bold ml-1">{{ $indicador->frecuencia->nombre }}</span>
                        </div>

                        <div>
                            <div class="flex items-center">
                                <div class="whitespace-nowrap">
                                    Inicio
                                    <input wire:model="fecha_medicion_inicio" type="date"
                                           class="unstyled cursor-pointer pl-1 pr-0 py-0 input-form-none w-min bg-transparent font-bold hover:text-blue-600">
                                </div>

                                <div class="whitespace-nowrap">
                                    Fin
                                    <input wire:model="fecha_medicion_fin" type="date"
                                           class="unstyled cursor-pointer pl-1 pr-0 py-0 input-form-none w-min bg-transparent font-bold hover:text-blue-600">
                                </div>
                            </div>
                            <div class="text-xs w-full text-center">
                                <p class="{{ $diffIsOk ? 'text-gray-600' : 'text-red-600 '}}">
                                    Hay un rango de {{ $diffInDays }} dias entre estas fechas
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- Resultados de medicion --}}
                    <div class="border border-indigo-600 border-dashed p-6 rounded-lg space-y-4">
                        {{-- Resultados de medicion --}}
                        <div class="grid grid-cols-3 gap-x-4">
                            @if($indicador->titulo_interes)
                                <div class="col-span-1">
                                    <x-jet-label>{{ $indicador->titulo_interes }}</x-jet-label>
                                    <input value="{{ round($interes, 1) }}" class="py-1 input-form w-full bg-gray-100"
                                           readonly>
                                </div>

                                <div class="col-span-1">
                                    <x-jet-label>{{ $indicador->titulo_total }}</x-jet-label>
                                    <input value="{{ round($total, 1) }}" class="py-1 input-form w-full bg-gray-100"
                                           readonly>
                                </div>
                            @endif
                            <div class="col-span-1">
                                <x-jet-label>{{ $indicador->titulo_resultado }}</x-jet-label>
                                <input value="{{ round($resultado, 1) }} {{ $indicador->titulo_interes ? '%': '' }}  "
                                       class="py-1 input-form w-full bg-gray-100"
                                       readonly>
                            </div>

                            <div class="col-span-3">
                                <span class="text-gray-500 text-sm flex items-center py-0.5">
                                    <x-icons.quality class="h-5 w-5 mr-2"></x-icons.quality>
                                    Estos valores son calculados automaticamente, no pueden editarse manualmente.
                                </span>
                            </div>
                        </div>

                        {{-- Intervalos de medicion --}}
                        <div class="grid grid-cols-3 gap-x-4">
                            <div class="col-span-1">
                                <x-jet-label for="minimo">Minimo</x-jet-label>
                                <input type="number" id="minimo" wire:model="min" class="input-form w-full">
                            </div>

                            <div class="col-span-1">
                                <x-jet-label for="satisfactorio">Satisfactorio</x-jet-label>
                                <input type="number" id="satisfactorio" wire:model="sat" class="input-form w-full">
                            </div>

                            <div class="col-span-1">
                                <x-jet-label for="sobresaliente">Sobresaliente</x-jet-label>
                                <input type="number" id="sobresaliente" wire:model="sob" class="input-form w-full">
                            </div>

                            <div
                                class="flex justify-between items-center col-span-3 mt-1 text-sm text-gray-600 rounded-lg flex items-center bg-white pt-2 ml-2">
                                <div>
                                    <input type="checkbox" wire:model.defer="guardar" id="guardar"
                                           class="text-blue-600 rounded mr-2 cursor-pointer">
                                    <label for="guardar" class="cursor-pointer">
                                        Guardar estos valores para futuras instancias de este indicador.
                                    </label>
                                </div>
                                <x-button-void wire:click="emitirEvento">
                                    <x-icons.load wire:loading wire:target="emitirEvento"
                                                  class="h-5 w-5 text-gray-400"></x-icons.load>
                                    {{ __('Ver gráfico') }}
                                </x-button-void>
                            </div>
                        </div>

                        @livewire('indicador.grafico-unitario', [
                        'min' => $min, 'sat' => $sat, 'sob' => $sob, 'resultado' => $resultado
                        ])

                    </div>

                    {{-- Analisis y Observaciones --}}
                    <div class="py-2 rounded-lg space-y-4">
                        <div>
                            <x-jet-label for="analisis">Analisis/Interpretación de los resultados</x-jet-label>
                            <textarea id="analisis" rows="2" wire:model.defer="analisis"
                                      class="input-form w-full"></textarea>
                        </div>
                        <div>
                            <x-jet-label for="observacion">Observaciones</x-jet-label>
                            <textarea id="observacion" rows="2" wire:model.defer="observaciones"
                                      class="input-form w-full"></textarea>
                        </div>
                    </div>

                    {{-- Personal encargado --}}
                    <div class="grid grid-cols-3 gap-x-4 py-2">
                        <div>
                            <x-jet-label for="elaborado">Elaborado por:</x-jet-label>
                            <input id="elaborado" type="text" wire:model.defer="elaborador"
                                   class="input-form w-full placeholder-gray-400"
                                   placeholder="Ej. Dr. John Doe">
                        </div>
                        <div>
                            <x-jet-label for="revisado">Revisado por:</x-jet-label>
                            <input id="revisado" type="text" wire:model.defer="revisador"
                                   class="input-form w-full placeholder-gray-400"
                                   placeholder="Ej. Dr. John Doe">
                        </div>
                        <div>
                            <x-jet-label for="aprovado">Aprobado por:</x-jet-label>
                            <input id="aprovado" type="text" wire:model.defer="aprobador"
                                   class="input-form w-full placeholder-gray-400"
                                   placeholder="Ej. Dr. John Doe">
                        </div>
                    </div>
                </div>

            </x-slot>

            <x-slot name="footer">
                @if($diffIsOk)
                    <x-jet-button
                        wire:click="guardarInstancia"
                        wire:target="guardarInstancia"
                        wire:loading.class="bg-gray-800"
                        wire:loading.attr="disabled">
                        <x-icons.load wire:loading wire:target="guardarInstancia" class="h-5 w-5"></x-icons.load>
                        {{ __('Guardar') }}
                    </x-jet-button>
                @else
                    <x-jet-button disabled>
                        {{ __('Guardar') }}
                    </x-jet-button>
                @endif
            </x-slot>
        </x-jet-dialog-modal>
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
        })

    </script>
@endpush
