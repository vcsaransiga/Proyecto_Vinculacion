<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <x-app.navbar />
        <div class="px-5 py-4 container-fluid">
            <div class="container">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <canvas id="eventChart"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <canvas id="modelChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <canvas id="userChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Configuración del gráfico circular de tipos de evento
        const eventCtx = document.getElementById('eventChart').getContext('2d');
        const eventData = {
            labels: ['Creado', 'Actualizado', 'Eliminado', 'Restaurado'],
            datasets: [{
                label: 'Tipos de eventos',
                data: [
                    {{ $eventCountsData['created'] }},
                    {{ $eventCountsData['updated'] }},
                    {{ $eventCountsData['deleted'] }},
                    {{ $eventCountsData['restored'] }}
                ],
                backgroundColor: [
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(153, 102, 255, 0.2)'
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(153, 102, 255, 1)'
                ],
                borderWidth: 1
            }]
        };

        const eventConfig = {
            type: 'doughnut',
            data: eventData,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Distribución de tipos de eventos'
                    }
                }
            },
        };

        const eventChart = new Chart(eventCtx, eventConfig);

        // Configuración del gráfico de barras de usuarios más activos
        const userCtx = document.getElementById('userChart').getContext('2d');
        const userData = {
            labels: {!! json_encode($userNames) !!},
            datasets: [{
                label: 'Usuarios más activos',
                data: {!! json_encode($userCounts) !!},
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        };

        const userConfig = {
            type: 'bar',
            data: userData,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Usuarios más activos'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            },
        };

        const userChart = new Chart(userCtx, userConfig);

        // Configuración del gráfico circular de modelos más modificados
        const modelCtx = document.getElementById('modelChart').getContext('2d');
        const modelData = {
            labels: {!! json_encode($modelNames) !!},
            datasets: [{
                label: 'Modelos más modificados',
                data: {!! json_encode($modelCounts) !!},
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(201, 203, 207, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(75, 192, 192, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 205, 86, 1)',
                    'rgba(201, 203, 207, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(75, 192, 192, 1)'
                ],
                borderWidth: 1
            }]
        };

        const modelConfig = {
            type: 'doughnut',
            data: modelData,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Modelos más modificados'
                    }
                }
            },
        };

        const modelChart = new Chart(modelCtx, modelConfig);
    });
</script>
