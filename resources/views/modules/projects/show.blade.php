<link rel="stylesheet" href="{{ asset('assets/css/projects-list.css') }}">

<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <x-app.navbar />
        <div class="container-fluid py-6">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h3 class="ml-3">Datos Generales</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="row ml-2">
                                        {{-- <div class="col-md-4">
                                            <p class="font-weight-bold mb-1">Nombre del Proyecto:</p>
                                            <p class="font-weight-bold mb-2">Responsable del Proyecto:</p>
                                            <p class="font-weight-bold mb-3">Periodos del proyecto:</p>
                                            <p class="font-weight-bold mb-3">Modulos del Proyecto:</p>
                                            <p class="font-weight-bold mb-3">Presupuesto del proyecto:</p>
                                        </div>
                                        <div class="col-md-8">
                                            <p class="mb-2">{{ $project->name }}</p>
                                            <p class="mb-2">{{ $project->responsible->name }}
                                                {{ $project->responsible->last_name }}</p>
                                            <p class="mb-2">{{ $project->start_date }} - {{ $project->end_date }}</p>
                                            <p class="mb-2">
                                                @foreach ($project->modules as $module)
                                                    {{ $module->name }}@if (!$loop->last)
                                                        ,
                                                    @endif
                                                @endforeach
                                            </p>
                                            <p class="mb-2">${{ number_format($project->budget, 2) }}</p>
                                        </div> --}}
                                        <table class="table table-borderless">
                                            <tbody>
                                                <tr>
                                                    <th class="font-weight-bold w-25">Nombre:</th>
                                                    <td>{{ $project->name }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="font-weight-bold">Responsable:</th>
                                                    <td>{{ $project->responsible->name }}
                                                        {{ $project->responsible->last_name }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="font-weight-bold">Periodo:</th>
                                                    <td>{{ $project->start_date }} - {{ $project->end_date }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="font-weight-bold align-top">Modulos:</th>
                                                    <td>
                                                        <div class="tw-flex tw-flex-wrap tw-gap-1">
                                                            @foreach ($project->modules as $module)
                                                                <span
                                                                    class="tw-bg-gray-200 tw-rounded-full tw-px-3 tw-py-1 tw-text-sm tw-font-semibold tw-text-gray-700">
                                                                    {{ $module->name }}
                                                                </span>
                                                            @endforeach
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="font-weight-bold">Presupuesto:</th>
                                                    <td>${{ number_format($project->budget, 2) }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="font-weight-bold">Porcentaje de compleción:</th>
                                                    <td>
                                                        <div class="tw-w-full tw-max-w-xs">
                                                            <div
                                                                class="tw-mb-1 tw-text-base tw-font-medium tw-text-gray-700 dark:tw-text-gray-400">
                                                                {{ $project->progress }}%
                                                            </div>
                                                            <div
                                                                class="tw-w-full tw-bg-gray-200 tw-rounded-full tw-h-2.5 dark:tw-bg-gray-700">
                                                                <div class="tw-bg-blue-600 tw-h-2.5 tw-rounded-full"
                                                                    style="width: {{ $project->progress }}%"></div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-4 d-flex justify-content-end pr-5">
                                    <div class="bg-secondary rounded p-3 h-100 "
                                        style="height: 400px; width: 400px; overflow: hidden;">
                                        {{-- <img src="{{ $project->image ? asset('storage/' . $project->image) : asset('assets/default.jpg') }}"
                                            alt="Proyecto" class="img-fluid rounded"> --}}
                                        @if (is_null($project->image))
                                            <img src="../assets/img/projects/default.png" class="img-fluid rounded" />
                                        @else
                                            <img src="{{ asset('storage/' . $project->image) }}"
                                                class="img-fluid rounded">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <ul class="nav nav-tabs" id="menu">
                                <li class="nav-item"><a class="nav-link" id="tareas" href="#">Tareas</a></li>
                                <li class="nav-item"><a class="nav-link" id="kardex" href="#">Kardex</a></li>
                                <li class="nav-item"><a class="nav-link" id="descripcion" href="#">Descripción</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" id="recursos" href="#">Recursos</a></li>
                            </ul>

                            <div class="tab-content mt-3">
                                <div id="tareas-content" class="tab-pane contents">
                                    <div class="container">
                                        <div class="row">
                                            @if ($project->tasks->isEmpty())
                                                <div class="col-12">
                                                    <div class="alert alert-info" role="alert">
                                                        No hay tareas asociadas a este proyecto.
                                                    </div>
                                                </div>
                                            @else
                                                @foreach ($project->tasks as $task)
                                                    <div class="col-md-3 mb-4">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="text-center mb-3">
                                                                    @if ($task->status == 'Completado')
                                                                        <img src="{{ asset('assets/img/logos/completed.svg') }}"
                                                                            class="img-fluid" alt="Completado Logo"
                                                                            style="width: 40px;">
                                                                    @else
                                                                        <img src="{{ asset('assets/img/logos/pending.svg') }}"
                                                                            class="img-fluid" alt="Pendiente Logo"
                                                                            style="width: 40px;">
                                                                    @endif
                                                                </div>
                                                                <h5 class="card-title">{{ $task->name }}</h5>
                                                                <p class="card-text"><strong>Horas:</strong>
                                                                    {{ $task->hours }}</p>
                                                                <p class="card-text"><strong>Fecha:</strong>
                                                                    {{ $task->start_date }} - {{ $task->end_date }}
                                                                </p>
                                                                <p class="card-text"><strong>Porcentaje
                                                                        Proyecto:</strong>
                                                                    {{ $task->percentage }}%</p>
                                                                <p class="card-text"><strong>Estado:</strong>
                                                                    {{ $task->status }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div id="kardex-content" class="tab-pane contents">
                                    @if ($project->kardex->isEmpty())
                                        <div class="alert alert-info" role="alert">
                                            No hay movimientos de kardex asociados a este proyecto.
                                        </div>
                                    @else
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Operacion</th>
                                                        <th>Bodega</th>
                                                        <th>Fecha</th>
                                                        <th>Cantidad</th>
                                                        <th>Precio</th>
                                                        <th>Saldo</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($project->kardex as $kardex)
                                                        <tr>
                                                            <td>{{ $kardex->id_kardex }}</td>
                                                            <td>{{ $kardex->operationType->name }}</td>
                                                            <td>{{ $kardex->warehouse->name }}</td>
                                                            <td>{{ $kardex->date }}</td>
                                                            <td>{{ $kardex->quantity }}</td>
                                                            <td>${{ $kardex->price }}</td>
                                                            <td>${{ $kardex->balance }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @endif
                                </div>

                                <div id="descripcion-content" class="tab-pane contents">
                                    <p class="text-center">{{ $project->description }}</p>
                                </div>

                                <div id="recursos-content" class="tab-pane contents">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Descripción</th>
                                                    <th>Descargar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Información del Proyecto</td>
                                                    <td>Archivo de información del proyecto</td>
                                                    <td class="text-center">
                                                        <img src="https://img.icons8.com/ios-filled/50/000000/download.png"
                                                            alt="Descargar" style="width: 20px; height: 20px;">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Presupuesto</td>
                                                    <td>Archivo de presupuesto del proyecto</td>
                                                    <td class="text-center">
                                                        <img src="https://img.icons8.com/ios-filled/50/000000/download.png"
                                                            alt="Descargar" style="width: 20px; height: 20px;">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>

<style>
    .nav-tabs .nav-link {
        color: #0F172A;
        font-weight: bold;
    }

    .nav-tabs .nav-link:hover,
    .nav-tabs .nav-link.active {
        border-bottom: 2px solid #0F172A;
    }

    .tab-content {
        padding: 20px 0;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const menu = document.getElementById('menu');
        const contents = document.querySelectorAll('.tab-pane');
        const menuItems = menu.querySelectorAll('.nav-link');

        function showContent(targetId) {
            menuItems.forEach(item => item.classList.remove('active'));
            contents.forEach(content => content.classList.remove('show', 'active'));

            const selectedItem = document.getElementById(targetId.replace('-content', ''));
            if (selectedItem) {
                selectedItem.classList.add('active');
            }

            const targetContent = document.getElementById(targetId);
            if (targetContent) {
                targetContent.classList.add('show', 'active');
            }
        }

        const lastSelected = localStorage.getItem('lastSelected') || 'tareas-content';
        showContent(lastSelected);

        menu.addEventListener('click', function(e) {
            if (e.target && e.target.classList.contains('nav-link')) {
                e.preventDefault();
                const targetId = e.target.id + '-content';
                localStorage.setItem('lastSelected', targetId);
                showContent(targetId);
            }
        });
    });
</script>
