<div>
    <x-jet-button wire:click="$set('mostrar', true)">
        <x-icons.plus :stroke="2" class="h-6 w-6 mr-2"></x-icons.plus>
        Crear nuevo
    </x-jet-button>

    @if($indicador)
        <x-jet-dialog-modal wire:model="mostrar" maxWidth="xl">
            <x-slot name="title">
                <h1 class="text-lg font-bold tracking-wide text-gray-800">
                    Crear nueva instancia del indicador
                </h1>

                <button wire:click="$set('mostrar', false)" class=" text-gray-600 hover:text-gray-800">
                    <x-icons.x :stroke="1.5" class="h-5 w-5"></x-icons.x>
                </button>
            </x-slot>
            <x-slot name="content">

                <div class="space-y-4">

                    <div class="p-4 bg-blue-50 rounded-lg space-y-4">
                        <div>
                            <x-jet-label>
                                {{ $indicador->titulo_resultado }}
                            </x-jet-label>
                            <input type="text" value="{{ $resultado }}" class="input-form w-full bg-gray-100" readonly>
                            <span class="text-gray-500 text-sm flex items-center py-0.5">
                                <svg class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                                </svg>
                                Este valor es calculado automaticamente, no puede editarse manualmente
                            </span>
                        </div>

                        <div class="grid grid-cols-3 gap-x-4">
                            <div class="col-span-1">
                                <x-jet-label>Minimo</x-jet-label>
                                <input type="number" wire:model="min" class="input-form w-full">
                            </div>

                            <div class="col-span-1">
                                <x-jet-label>Satisfactorio</x-jet-label>
                                <input type="number" wire:model="sat" class="input-form w-full">
                            </div>

                            <div class="col-span-1">
                                <x-jet-label>Sobresaliente</x-jet-label>
                                <input type="number" wire:model="sob" class="input-form w-full">
                            </div>

                            <div
                                class="col-span-3 mt-1 text-sm text-gray-700 rounded-lg flex items-center bg-white py-1 px-4">
                                <input type="checkbox" wire:model.defer="guardar" id="guardar"
                                       class="text-blue-600 rounded mr-2 cursor-pointer">
                                <label for="guardar" class="cursor-pointer">
                                    Guardar estos valores para futuras instancias de este indicador.
                                </label>
                            </div>
                        </div>
                    </div>

                    {{-- INICIO Grafico --}}
                    <div class="px-6">
                        <div class="flex justify-end">
                            <button class="underline text-blue-900 text-sm" wire:click="toggleGrafico">
                                @if($verGrafico)
                                    Ocultar gráfico
                                @else
                                    Ver gráfico
                                @endif
                            </button>
                        </div>
                        @if($verGrafico)
                            <canvas id="single-chart"></canvas>
                        @endif
                    </div>
                    {{-- FIN    Grafico --}}

                    <div class="bg-gray-50 p-4 rounded-lg space-y-4">
                        <div>
                            <x-jet-label>Analisis/Interpretación de los resultados:</x-jet-label>
                            <textarea rows="3" wire:model.defer="analisis" class="input-form w-full"></textarea>
                        </div>
                        <div>
                            <x-jet-label>Observaciones:</x-jet-label>
                            <textarea rows="3" wire:model.defer="observaciones" class="input-form w-full"></textarea>
                        </div>
                    </div>

                    <div class="bg-gray-50 p-4 rounded-lg space-y-4">
                        <div>
                            <x-jet-label>Elaborado por:</x-jet-label>
                            <input type="text" wire:model.defer="elaborador"
                                   class="input-form w-full placeholder-gray-400"
                                   placeholder="Ej. Dr. John Doe">
                        </div>
                        <div>
                            <x-jet-label>Revisado por:</x-jet-label>
                            <input type="text" wire:model.defer="revisador"
                                   class="input-form w-full placeholder-gray-400"
                                   placeholder="Ej. Dr. John Doe">
                        </div>
                        <div>
                            <x-jet-label>Aprobado por:</x-jet-label>
                            <input type="text" wire:model.defer="aprobador"
                                   class="input-form w-full placeholder-gray-400"
                                   placeholder="Ej. Dr. John Doe">
                        </div>
                    </div>

                </div>

            </x-slot>
            <x-slot name="footer">

                <x-jet-button
                    wire:click="guardarInstancia"
                    wire:target="guardarInstancia"
                    wire:loading.class="bg-gray-800"
                    wire:loading.attr="disabled">
                    <svg wire:loading wire:target="guardarInstancia"
                         class="animate-spin -ml-1 mr-3 h-4 w-4 text-white"
                         fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor"
                              d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <span>
                            {{ __('Guardar') }}
                        </span>
                </x-jet-button>

            </x-slot>
        </x-jet-dialog-modal>
    @endif
</div>

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js" defer></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>


        Livewire.on('guardado', msg => {
            Swal.fire({
                icon: 'success',
                title: '',
                text: msg,
            });
        })

        window.addEventListener('crearGrafico', event => {

            let sob = [], sat = [], min = [], bar = [];
            let label = [], color = [];

            sob.push(event.detail.dato.sobresaliente);
            sat.push(event.detail.dato.satisfactorio);
            min.push(event.detail.dato.minimo);
            bar.push(event.detail.dato.bar);
            label.push(event.detail.dato.label);
            color.push(event.detail.dato.color);

            new Chart(document.getElementById("single-chart"), {
                type: 'bar',
                data: {
                    labels: label,
                    datasets: [
                        {
                            type: 'line',
                            label: 'Sobresaliente',
                            data: sob,
                            fill: false,
                            borderColor: '#16A34A',
                            pointBorderWidth: 7,
                        }, {
                            type: 'line',
                            label: 'Satisfactorio',
                            data: sat,
                            fill: false,
                            borderColor: '#D97706',
                            pointBorderWidth: 7,
                        }, {
                            type: 'line',
                            label: 'Minimo',
                            data: min,
                            fill: false,
                            borderColor: '#E11D48',
                            pointBorderWidth: 7,
                        }, {
                            type: 'bar',
                            label: 'Resultado',
                            data: bar,
                            backgroundColor: color,
                        },
                    ],

                },
                options: {
                    legend: {
                        display: false,
                        position: 'bottom'
                    },
                    title: {
                        display: false,
                        text: 'Comportamiento del indicador'
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }],
                    },
                    responsive: true,
                }
            });
        })

    </script>

@endpush
