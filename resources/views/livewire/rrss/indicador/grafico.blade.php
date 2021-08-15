<div>
    <div class="flex justify-end gap-x-4 items-start">
        <x-button-void wire:click="generarDatos">
            <svg class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor" wire:loading.remove>
                <path
                    d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"/>
            </svg>

            <svg class="animate-spin h-5 w-5 mr-1" fill="none" wire:loading
                 viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor"
                      d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            Mostrar gráfico
        </x-button-void>
    </div>
    @if($mostrarGrafico)
        <div class="px-8 py-3">
            <canvas id="bar-chart"></canvas>

            <h1 class="mt-4 flex items-center justify-center font-semibold text-gray-400 text-sm">
                <svg class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                Si no puede ver el gráfico, pruebe a refrescar la página.
            </h1>
        </div>
    @endif

</div>

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>

    <script>

        let sobresaliente, satisfactorio, minimo, bar;
        let labels, colores;

        window.addEventListener('grafico', event => {

            sobresaliente = event.detail.datos.sobresaliente;
            satisfactorio = event.detail.datos.satisfactorio;
            minimo = event.detail.datos.minimo;
            bar = event.detail.datos.bar;
            labels = event.detail.datos.labels;
            colores = event.detail.datos.colors;

            new Chart(document.getElementById("bar-chart"), {
                type: 'bar',
                data: {

                    labels: labels,
                    datasets: [
                        {
                            type: 'line',
                            label: 'Sobresaliente',
                            data: sobresaliente,
                            fill: false,
                            borderColor: '#16A34A',
                            tension: 0.1,
                            pointBorderWidth: 7,
                        }, {
                            type: 'line',
                            label: 'Satisfactorio',
                            data: satisfactorio,
                            fill: false,
                            borderColor: '#D97706',
                            tension: 0.1,
                            pointBorderWidth: 7,
                        }, {
                            type: 'line',
                            label: 'Minimo',
                            data: minimo,
                            fill: false,
                            borderColor: '#E11D48',
                            tension: 0.1,
                            pointBorderWidth: 7,
                        }, {
                            type: 'bar',
                            label: 'Resultado',
                            data: bar,
                            backgroundColor: colores
                        },
                    ],

                },
                options: {
                    legend: {
                        display: true,
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
                        }]
                    },
                    responsive: true,
                }
            });
        })

    </script>

@endpush
