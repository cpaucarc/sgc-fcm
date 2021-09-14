<div>
    @if($mostrar)
        <x-jet-dialog-modal wire:model="mostrar">
            <x-slot name="title">
                <div></div>
                <button wire:click="$set('mostrar', false)" class=" text-gray-600 hover:text-gray-800">
                    <x-icons.x :stroke="1.5" class="h-5 w-5"></x-icons.x>
                </button>
            </x-slot>
            <x-slot name="content">
                <canvas id="grafico-unitario"></canvas>
            </x-slot>
        </x-jet-dialog-modal>
    @endif

    @push('js')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js" defer></script>

        <script>

            window.addEventListener('mostrarGrafico', event => {

                let sob = [], sat = [], min = [], bar = [];
                let label = [], color = [];

                sob.push(event.detail.dato.sobresaliente);
                sat.push(event.detail.dato.satisfactorio);
                min.push(event.detail.dato.minimo);
                bar.push(event.detail.dato.bar);
                label.push(event.detail.dato.label);
                color.push(event.detail.dato.color);

                new Chart(document.getElementById("grafico-unitario"), {
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
                            }],
                        },
                        responsive: true,
                    }
                });
            })
        </script>

    @endpush
</div>
