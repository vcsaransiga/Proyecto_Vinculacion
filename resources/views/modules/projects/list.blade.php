<!-- resources/views/modules/projects/index.blade.php -->

<link rel="stylesheet" href="{{ asset('assets/css/projects-list.css') }}">

<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <x-app.navbar />
        <div class="px-5 container-fluid">
            <div class="mt-0 row">
                <div class="col-12">
                    <div class="card">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        <div class="pb-0 card-header">
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="">Proyectos UEPS</h5>
                                </div>
                                <div class="col-6 text-end">
                                    <button type="button" class="btn btn-dark btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#createProjectModal">
                                        <i class="fas fa-plus me-2"></i> Agregar proyecto
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                    <section class="wrapper">
                        <div class="container-fostrap">

                            <div class="content">
                                <div class="container">
                                    <div class="row" id="project-list">
                                        @foreach ($projects as $project)
                                            <div class="col-xs-10 col-sm-3 mb-4 project-item">
                                                <div class="card">
                                                    <a class="img-card"
                                                        href="{{ route('projects.show', $project->id_pro) }}">

                                                        @if (is_null($project->image))
                                                            <img src="../assets/img/projects/default.png" />
                                                        @else
                                                            {{-- <img src="{{ asset('storage/' . $project->image }} )"/> --}}
                                                            <img src="{{ asset('storage/' . $project->image) }}">
                                                        @endif

                                                    </a>
                                                    <div class="card-content">
                                                        <h4 class="card-title">
                                                            <a href="{{ route('projects.show', $project->id_pro) }}">
                                                                {{ $project->name }}
                                                            </a>
                                                        </h4>
                                                        <p class="text-sm">
                                                            <strong>Responsable:
                                                            </strong>{{ $project->responsible->name }}
                                                            {{ $project->responsible->last_name }}
                                                        </p>
                                                        <p class="text-sm">
                                                            <strong>Módulos: </strong>
                                                            @foreach ($project->modules as $module)
                                                                {{ $module->name }}@if (!$loop->last)
                                                                    ,
                                                                @endif
                                                            @endforeach
                                                        </p>
                                                        <p class="text-sm">
                                                            <strong>Estado: </strong>{{ ucfirst($project->status) }}
                                                        </p>
                                                        <p class="text-sm">
                                                            <strong>Presupuesto:
                                                            </strong>${{ number_format($project->budget, 2) }}
                                                        </p>
                                                    </div>
                                                    <div class="px-3 pb-3">
                                                        <div class="progress">
                                                            <div class="progress-bar" role="progressbar"
                                                                style="width: {{ $project->progress }}%"
                                                                aria-valuenow="{{ $project->progress }}"
                                                                aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <div class="mt-3">
                                                            <span class="text1">{{ $project->progress }}%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div
                                class="tw-flex tw-items-center tw-justify-between tw-px-4 tw-py-3 tw-bg-white tw-border-t tw-border-gray-200 sm:tw-px-6">
                                <div class="tw-flex tw-items-center">
                                    <span class="tw-text-sm tw-text-gray-700 tw-mr-2">Mostrar</span>
                                    <select id="records-per-page"
                                        class="tw-form-select tw-rounded-md tw-shadow-sm tw-text-sm tw-font-medium tw-text-gray-700 tw-bg-white hover:tw-bg-gray-50 focus:tw-outline-none focus:tw-ring-2 focus:tw-ring-offset-2 focus:tw-ring-offset-gray-100 focus:tw-ring-indigo-500">
                                        <option value="5">5</option>
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                    </select>
                                    <span class="tw-text-sm tw-text-gray-700 tw-ml-2">registros</span>
                                </div>
                                <div class="tw-flex tw-items-center">
                                    <span class="tw-text-sm tw-text-gray-700 tw-mr-2">Página</span>
                                    <div id="pagination-numbers" class="tw-flex tw-space-x-2">
                                        <!-- Los números de página se renderizarán aquí -->
                                    </div>
                                </div>
                            </div>

                        </div>
                    </section>
                </div>
            </div>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const totalRecords = {{ $projects->count() }};
            const projectList = document.getElementById('project-list');
            const paginationContainerId = 'pagination-numbers';
            const defaultRecordsPerPage = 10;

            function initPagination(totalRecords, projectList, paginationContainerId, defaultRecordsPerPage = 10) {
                let currentPage = 1;
                let recordsPerPage = defaultRecordsPerPage;
                const paginationContainer = document.getElementById(paginationContainerId);
                const recordsPerPageSelect = document.getElementById('records-per-page');

                function displayRecords() {
                    const startIndex = (currentPage - 1) * recordsPerPage;
                    const endIndex = startIndex + recordsPerPage;
                    const projectItems = projectList.querySelectorAll('.project-item');

                    projectItems.forEach((item, index) => {
                        item.style.display = index >= startIndex && index < endIndex ? '' : 'none';
                    });
                }

                function renderPaginationNumbers() {
                    paginationContainer.innerHTML = '';
                    const totalPages = Math.ceil(totalRecords / recordsPerPage);

                    for (let i = 1; i <= totalPages; i++) {
                        const pageLink = document.createElement('a');
                        pageLink.href = '#';
                        pageLink.classList.add('tw-px-3', 'tw-py-2', 'tw-leading-tight', 'tw-text-gray-500',
                            'tw-bg-white',
                            'tw-border', 'tw-border-gray-300', 'tw-rounded-md', 'hover:tw-bg-gray-100',
                            'hover:tw-text-gray-700');
                        if (i === currentPage) {
                            pageLink.classList.add('tw-text-gray-700', 'tw-bg-gray-100');
                        }
                        pageLink.textContent = i;
                        pageLink.addEventListener('click', (event) => {
                            event.preventDefault();
                            currentPage = i;
                            displayRecords();
                            renderPaginationNumbers();
                        });

                        paginationContainer.appendChild(pageLink);
                    }
                }

                function handleRecordsPerPageChange(event) {
                    recordsPerPage = parseInt(event.target.value);
                    currentPage = 1;
                    displayRecords();
                    renderPaginationNumbers();
                }

                recordsPerPageSelect.value = defaultRecordsPerPage;
                recordsPerPageSelect.addEventListener('change', handleRecordsPerPageChange);

                displayRecords();
                renderPaginationNumbers();
            }

            initPagination(totalRecords, projectList, paginationContainerId, defaultRecordsPerPage);
        });
    </script>
</x-app-layout>
