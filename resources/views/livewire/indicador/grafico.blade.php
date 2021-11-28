<div>
    <div class="flex justify-end gap-x-4 items-start">
        <x-button-void wire:click="generarDatos">
            <svg class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor" wire:loading.remove>
                <path
                    d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"/>
            </svg>

            <x-icons.load class="h-5 w-5 mr-1 text-gray-600" wire:loading></x-icons.load>
            Mostrar gráfico
        </x-button-void>
    </div>
    @if($mostrarGrafico)
        <div class="px-8 py-3">
            <canvas id="bar-chart"></canvas>

            <h3 class="mt-4 flex items-center justify-center font-semibold text-gray-400 text-sm">
                <x-icons.info class="h-6 w-6 mr-2"></x-icons.info>
                Si no puede ver el gráfico, pruebe a refrescar la página.
            </h3>
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
