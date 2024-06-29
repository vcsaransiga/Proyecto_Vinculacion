<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <x-app.navbar />
        <div class="container-fluid py-6">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h3 style="margin-left: 5vh;">Datos Generales</h3>
                        </div>
                        <div  style="display: flex; justify-content:space-between;">
                            <div style="display: flex;">
                                <div style="margin-top: 7vh; margin-left: 5vh;">
                                    <p style="font-weight: bold; color:#0F172A;">Nombre del Proyecto:</p>
                                    <p style="font-weight: bold; color:#0F172A;">Responsable del Proyecto:</p>
                                    <p style="font-weight: bold; color:#0F172A;">Periodo del Proyecto:</p>
                                    <p style="font-weight: bold; color:#0F172A;">Presupuesto del proyecto:</p>
                                </div>
                                <div style="margin-top: 7vh; margin-left: 5vh;">
                                    <p>Proyecto de Producción de Hortalizas</p>
                                    <p>Ing. Juan Perez</p>
                                    <p>2021-2022</p>
                                    <p>$ 1000</p>
                                </div>
                            </div>
                            <div class="col-4" style="background-color:rgb(143, 143, 143); border-radius:2%; margin-top:3vh; margin-right:5vh; width: 400px; height: 210px;">
                                <img src="../assets/img/logoDash.png" alt="ues" style="margin: auto;">
                            </div>
                        </div>
                        <div style="margin-top:2vh; margin-rigth:0;">
                            <div style="width:90%; margin:auto;  border-bottom: 3px solid #0F172A;" >
                                <ul style=" width:90%; display: flex; justify-content:space-between; padding:0; margin:auto">
                                    <li>
                                        <p style="font-weight: bold; color:#0F172A;">Tareas</p>
                                    </li>
                                    <li>
                                        <p style="font-weight: bold; color:#0F172A;">Kardex</p>
                                    </li>
                                    <li>
                                        <p style="font-weight: bold; color:#0F172A;" >Descripcion</p>
                                    </li>
                                    <li>
                                        <p style="font-weight: bold; color:#0F172A;" >Recursos</p>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>