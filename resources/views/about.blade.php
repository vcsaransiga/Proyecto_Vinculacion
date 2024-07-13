<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <x-app.navbar />
        {{-- <div class="container-fluid py-6">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0 text-aligne-center">
                            <h4>Sobre Nosotros</h4>
                        </div>
                        <div class="card-body">
                            <h5 style="text-align: center;">Unidad Educativa de Produccion "SARANCE"</h5>
                            <h6>Misión de la Institución Educativa:</h6>
                            <p style="text-align: justify">La Unidad Educativa “SARANCE” es una Institución Fiscal de excelencia, de carácter técnico y humanístico, orientada a formar estudiantes con espíritu crítico y emprendedor, aplicando procesos psicopedagógicos actualizados, concordantes con la ciencia y tecnología de vanguardia, como herramienta para la solución de problemas sociales y ambientales en un mundo globalizado.</p>
                            <h6>Visión de la Institución Educativa:</h6>
                            <p style="text-align: justify">Formar bachilleres técnicos en Producción Agropecuaria e Industrialización de Productos Alimenticios y Ciencias, legando a la sociedad educandos que contribuyan a mejorar la calidad de vida de la comunidad, la conservación y el manejo responsable de los recursos naturales con un equipo de técnicos, docentes y directivos que ofrecen aprendizajes de calidad y calidez con un nivel ético y académico de excelencia comprometido e inclusivo.</p>
                            <div class="">
                                <img src="../assets/img/logoUEP.png" alt="ues" style="width: 400px; height: 400px; margin: 0 auto;">
                            </div>
                            
                            <h5 style="text-align: center;">UEP-UES</h5>
                            <h6>Misión de la UEP-UES</h6>
                            <p style="text-align: justify">Organizar y orientar la formación integral permanente de los estudiantes vinculándolos en lo teórico- practico en los procesos de producción, investigación y administración, contribuyendo con una alimentación saludable de la comunidad educativa y su entorno y a la vez formar profesionales competentes, éticos para su desenvolvimiento en su vida profesional.</p>
                            <h6>Visión de la UEP-UES</h6>
                            <p style="text-align: justify" >Dentro de  4 años seremos una Unidad de Producción líder en la zona 1 en las áreas de Agropecuaria y Agroindustrias, llegando a ser Autosustentable y Autosostenible y referencia principal en el país.</p>
                            <div class="">
                                <img src="../assets/img/logohorizontal.png" alt="ues" style="width: 500px; height: 400px; margin: 0 auto;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <section class="">
            <div class="container">
                <div class="row gx-4 align-items-center justify-content-between">
                    <div class="col-md-6 order-2 order-md-1">
                        <div class="mt-5 mt-md-0">
                            <span class="text-muted">Sobre Nosotros</span>
                            <h2 class="display-5 fw-bold fs-3">Unidad Educativa de Producción "Sarance"</h2>
                            <hr>
                            <div class="row">
                                <div class="col-6 d-flex align-items-stretch">
                                    <div class="border rounded p-3 w-100">
                                        <div class="d-inline-flex">
                                            <img src="{{ asset('assets/img/logos/mission.svg') }}"
                                                class="tw-w-10 tw-h-10 tw-mb-3" alt="Mision Logo">
                                            <h2 class="display-5 fw-bold fs-4 ml-1">Misión</h2>
                                        </div>
                                        <p class="text-sm mb-0">La Unidad Educativa “SARANCE” es una Institución Fiscal
                                            de
                                            excelencia,
                                            de carácter técnico y humanístico, orientada a formar estudiantes con
                                            espíritu
                                            crítico y emprendedor, aplicando procesos psicopedagógicos actualizados,
                                            concordantes con la ciencia y tecnología de vanguardia, como herramienta
                                            para la
                                            solución de problemas sociales y ambientales en un mundo globalizado.</p>
                                    </div>
                                </div>
                                <div class="col-6 d-flex align-items-stretch">
                                    <div class="border rounded p-3 w-100">
                                        <div class="d-inline-flex">
                                            <img src="{{ asset('assets/img/logos/vission.svg') }}"
                                                class="tw-w-10 tw-h-10 tw-mb-3" alt="Vision Logo">
                                            <h2 class="display-5 fw-bold fs-4 ml-1">Visión</h2>
                                        </div>
                                        <p class="text-sm mb-0">Formar bachilleres técnicos en Producción Agropecuaria e
                                            Industrialización de Productos Alimenticios y Ciencias, legando a la
                                            sociedad
                                            educandos que contribuyan a mejorar la calidad de vida de la comunidad, la
                                            conservación y el manejo responsable de los recursos naturales con un equipo
                                            de
                                            técnicos, docentes y directivos que ofrecen aprendizajes de calidad y
                                            calidez
                                            con un nivel ético y académico de excelencia comprometido e inclusivo.</p>
                                    </div>
                                </div>
                            </div>

                            <h2 class="display-5 fw-bold fs-3 mt-3">UEP-UEPS</h2>
                            <hr>
                            <div class="row">
                                <div class="col-6 d-flex align-items-stretch">
                                    <div class="border rounded p-3 w-100">
                                        <div class="d-inline-flex">
                                            <img src="{{ asset('assets/img/logos/mission 2.svg') }}"
                                                class="tw-w-10 tw-h-10 tw-mb-3" alt="Mision Logo">
                                            <h2 class="display-5 fw-bold fs-4 ml-1">Misión</h2>
                                        </div>
                                        <p class="text-sm mb-0">Organizar y orientar la formación integral permanente de
                                            los
                                            estudiantes vinculándolos en lo teórico- práctico en los procesos de
                                            producción,
                                            investigación y administración, contribuyendo con una alimentación saludable
                                            de
                                            la comunidad educativa y su entorno y a la vez formar profesionales
                                            competentes,
                                            éticos para su desenvolvimiento en su vida profesional.</p>
                                    </div>
                                </div>
                                <div class="col-6 d-flex align-items-stretch">
                                    <div class="border rounded p-3 w-100">
                                        <div class="d-inline-flex">
                                            <img src="{{ asset('assets/img/logos/vission 2.svg') }}"
                                                class="tw-w-10 tw-h-10 tw-mb-3" alt="Vision Logo">
                                            <h2 class="display-5 fw-bold fs-4 ml-1">Visión</h2>
                                        </div>
                                        <p class="text-sm mb-0">Dentro de 4 años seremos una Unidad de
                                            Producción líder en la
                                            zona
                                            1 en las áreas de Agropecuaria y Agroindustrias, llegando a ser
                                            Autosustentable
                                            y
                                            Autosostenible y referencia principal en el país.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 offset-md-1 order-1 order-md-2">
                        <div class="row gx-2 gx-lg-3">
                            <div class="col-6">
                                <div class="mb-2"><img class="img-fluid rounded-3"
                                        src="../assets/img/projects/cuy.png"></div>
                            </div>
                            <div class="col-6">
                                <div class="mb-2"><img class="img-fluid rounded-3"
                                        src="../assets/img/projects/planta.png"></div>
                            </div>
                            <div class="col-6">
                                <div class="mb-2"><img class="img-fluid rounded-3"
                                        src="../assets/img/projects/maiz.png"></div>
                            </div>
                            <div class="col-6">
                                <div class="mb-2"><img class="img-fluid rounded-3"
                                        src="../assets/img/projects/miel.png"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </main>
</x-app-layout>
