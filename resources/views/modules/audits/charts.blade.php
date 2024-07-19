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
                <div class="row mt-4 d-flex">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <select id="userSelect" class="form-select mb-3">
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }} {{ $user->last_name }}
                                        </option>
                                    @endforeach
                                </select>
                                <canvas id="likertChart"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card align-self-center">
                            <div class="card-body ">
                                <h5>Niveles de actividad:</h5>
                                <ul class="pl-0">
                                    <li><span class="color-circle" style="background-color: #C32314;"></span> Nula
                                        : 0 registros (nivel 0)</li>
                                    <li><span class="color-circle" style="background-color: #E6AAA0;"></span> Muy poca
                                        : 1-4 registros (nivel 1)</li>
                                    <li><span class="color-circle" style="background-color: #E1E1E1;"></span> Poca
                                        : 5-14 registros (nivel 2)</li>
                                    <li><span class="color-circle" style="background-color: #78AFE6;"></span> Actividad
                                        media: 15-29 registros (nivel 3)</li>
                                    <li><span class="color-circle" style="background-color: #4786E6;"></span> Alta
                                        : 30-49 registros (nivel 4)</li>
                                    <li><span class="color-circle" style="background-color: #236EC3;"></span> Mucha
                                        : 50 o más registros (nivel 5)</li>
                                </ul>
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

        // Gráfico de escala de Likert
        const likertCtx = document.getElementById('likertChart').getContext('2d');
        let likertChart;

        const updateLikertChart = (userId) => {
            fetch(`/audits/user-activity/${userId}`)
                .then(response => response.json())
                .then(data => {
                    let activityLevel;
                    let label;
                    let backgroundColor;
                    let borderColor;
                    if (data.count === 0) {
                        activityLevel = 0;
                        label = "Nula actividad\n(0)";
                        backgroundColor = '#C32314';
                        borderColor = '#C32314';
                    } else if (data.count < 5) {
                        activityLevel = 1;
                        label = "Muy poca actividad\n(1-4)";
                        backgroundColor = '#E6AAA0';
                        borderColor = '#E6AAA0';
                    } else if (data.count < 15) {
                        activityLevel = 2;
                        label = "Poca actividad\n(5-14)";
                        backgroundColor = '#E1E1E1';
                        borderColor = '#E1E1E1';
                    } else if (data.count < 30) {
                        activityLevel = 3;
                        label = "Actividad media\n(15-29)";
                        backgroundColor = '#78AFE6';
                        borderColor = '#78AFE6';
                    } else if (data.count < 50) {
                        activityLevel = 4;
                        label = "Alta actividad\n(30-49)";
                        backgroundColor = '#4786E6';
                        borderColor = '#4786E6';
                    } else {
                        activityLevel = 5;
                        label = "Mucha actividad\n(50+)";
                        backgroundColor = '#236EC3';
                        borderColor = '#236EC3';
                    }

                    const likertData = {
                        labels: [label],
                        datasets: [{
                            label: 'Nivel de actividad',
                            data: [activityLevel],
                            backgroundColor: [backgroundColor],
                            borderColor: [borderColor],
                            borderWidth: 1
                        }]
                    };

                    if (likertChart) {
                        likertChart.destroy();
                    }

                    likertChart = new Chart(likertCtx, {
                        type: 'bar',
                        data: likertData,
                        options: {
                            indexAxis: 'y',
                            responsive: true,
                            plugins: {
                                legend: {
                                    display: false
                                },
                                title: {
                                    display: true,
                                    text: 'Nivel de actividad del usuario'
                                }
                            },
                            scales: {
                                x: {
                                    beginAtZero: true,
                                    max: 5
                                }
                            }
                        }
                    });
                });
        };

        document.getElementById('userSelect').addEventListener('change', (event) => {
            updateLikertChart(event.target.value);
        });

        // Inicializar con el primer usuario seleccionado
        updateLikertChart(document.getElementById('userSelect').value);
    });
</script>

<style>
    .color-circle {
        display: inline-block;
        width: 10px;
        height: 10px;
        border-radius: 50%;
        margin-right: 10px;
    }
</style>
