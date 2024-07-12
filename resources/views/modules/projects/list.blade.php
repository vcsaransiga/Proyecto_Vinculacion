<link rel="stylesheet" href="{{ asset('assets/css/projects-list.css') }}">

<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <x-app.navbar />
        <div class="px-5 py-4 container-fluid">
            <div class="mt-4 row">
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

                        <section class="wrapper">
                            <div class="container-fostrap">
                                <div>

                                    <h1 class="heading">
                                        Proyectos UEPS
                                    </h1>
                                </div>
                                <div class="content">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-xs-10 col-sm-3">
                                                <div class="card">
                                                    <a class="img-card"
                                                        href="http://www.fostrap.com/2016/03/bootstrap-3-carousel-fade-effect.html">
                                                        <img
                                                            src="https://1.bp.blogspot.com/-Bii3S69BdjQ/VtdOpIi4aoI/AAAAAAAABlk/F0z23Yr59f0/s640/cover.jpg" />
                                                    </a>
                                                    <div class="card-content">
                                                        <h4 class="card-title">
                                                            <a
                                                                href="http://www.fostrap.com/2016/03/bootstrap-3-carousel-fade-effect.html">
                                                                Nombre de proyecto
                                                            </a>
                                                        </h4>
                                                        <p class="">
                                                            Responsable
                                                        </p>
                                                        <p class="text-sm">
                                                            Modulos
                                                        </p>
                                                    </div>
                                                    <div class="p-3">
                                                        <div class="progress">
                                                            <div class="progress-bar" role="progressbar"
                                                                style="width: 10%" aria-valuenow="50" aria-valuemin="0"
                                                                aria-valuemax="100"></div>
                                                        </div>
                                                        <div class="mt-3"> <span class="text1">10%
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-10 col-sm-3">
                                                <div class="card">
                                                    <a class="img-card"
                                                        href="http://www.fostrap.com/2016/03/5-button-hover-animation-effects-css3.html">
                                                        <img
                                                            src="https://3.bp.blogspot.com/-bAsTyYC8U80/VtLZRKN6OlI/AAAAAAAABjY/kAoljiMALkQ/s400/material%2Bnavbar.jpg" />
                                                    </a>
                                                    <div class="card-content">
                                                        <h4 class="card-title">
                                                            <a
                                                                href="http://www.fostrap.com/2016/03/bootstrap-3-carousel-fade-effect.html">
                                                                Nombre de proyecto
                                                            </a>
                                                        </h4>
                                                        <p class="">
                                                            Responsable
                                                        </p>
                                                        <p class="text-sm">
                                                            Modulos
                                                        </p>
                                                    </div>
                                                    <div class="p-3">
                                                        <div class="progress">
                                                            <div class="progress-bar" role="progressbar"
                                                                style="width: 10%" aria-valuenow="50" aria-valuemin="0"
                                                                aria-valuemax="100"></div>
                                                        </div>
                                                        <div class="mt-3"> <span class="text1">10%
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-10 col-sm-3">
                                                <div class="card">
                                                    <a class="img-card"
                                                        href="http://www.fostrap.com/2016/03/5-button-hover-animation-effects-css3.html">
                                                        <img
                                                            src="https://4.bp.blogspot.com/-TDIJ17DfCco/Vtneyc-0t4I/AAAAAAAABmk/aa4AjmCvRck/s1600/cover.jpg" />
                                                    </a>
                                                    <div class="card-content">
                                                        <h4 class="card-title">
                                                            <a
                                                                href="http://www.fostrap.com/2016/03/bootstrap-3-carousel-fade-effect.html">
                                                                Nombre de proyecto
                                                            </a>
                                                        </h4>
                                                        <p class="">
                                                            Responsable
                                                        </p>
                                                        <p class="text-sm">
                                                            Modulos
                                                        </p>

                                                    </div>
                                                    <div class="p-3">
                                                        <div class="progress">
                                                            <div class="progress-bar" role="progressbar"
                                                                style="width: 10%" aria-valuenow="50" aria-valuemin="0"
                                                                aria-valuemax="100"></div>
                                                        </div>
                                                        <div class="mt-3"> <span class="text1">10%
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>



    </main>

</x-app-layout>
