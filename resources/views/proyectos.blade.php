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
                                <img src="../assets/img/logoDash.png" alt="ues" style="margin: auto; width=100%; height:100%;">
                            </div>
                        </div>
                        <div style="margin-top:2vh; margin-rigth:0;">
                            <div style="width:90%; margin:auto;  border-bottom: 3px solid #0F172A;" >
                                <ul id="menu" style=" width:90%; display: flex; justify-content:space-between; padding:0; margin:auto">
                                    <li >
                                        <p id="tareas" style="font-weight: bold;">Tareas</p>
                                    </li>
                                    <li >
                                        <p id="kardex" style="font-weight: bold; ">Kardex</p>
                                    </li>
                                    <li >
                                        <p id="descripcion" style="font-weight: bold;" >Descripcion</p>
                                    </li>
                                    <li >
                                        <p id="recursos" style="font-weight: bold;" >Recursos</p>
                                    </li>
                                </ul>
                            </div>
                            <div id="tareas-content" class="contenidos">
                                <p>Contenido para Tareas</p>
                            </div>
                            <div id="kardex-content" class="contenidos">
                                <p>Contenido para Kardex</p>
                            </div>
                            <div id="descripcion-content" class="contenidos">
                                <p>Contenido para Descripcion</p>
                            </div>
                            <div id="recursos-content" class="contenidos">
                                <p>Contenido para Recursos</p>
                            </div>

                            <style>
                                .contenidos{
                                    display: none;
                                    
                                }
                                #tareas{
                                    cursor: pointer;
                                    color:#0F172A;
                                }
                                #kardex{
                                    cursor: pointer;
                                    color:#0F172A;

                                }
                                #descripcion{
                                    cursor: pointer;
                                    color:#0F172A;

                                }
                                #recursos{
                                    cursor: pointer;
                                    color:#0F172A;

                                }
                                #tareas:hover{
                                    border-radius:0; 
                                    border-bottom: 1px black solid;

                                }
                                #kardex:hover{                                    border-radius:0; 
                                    border-bottom: 1px black solid;

                                }
                                #descripcion:hover{                                    border-radius:0; 
                                    border-bottom: 1px black solid;
                                }
                                #recursos:hover{                                    border-radius:0; 
                                    border-bottom: 1px black solid;
                                }

                                .selected{                                    border-radius:0; 
                                    border-bottom: 1px black solid;
                                }
                            </style>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const menu = document.getElementById('menu');
    const contents = document.querySelectorAll('.contenidos');
    const menuItems = menu.querySelectorAll('p');

    // Function to show the target content
    function showContent(targetId) {
        // Remove 'selected' class from all menu items
        menuItems.forEach(item => item.classList.remove('selected'));

        // Hide all content
        contents.forEach(content => content.style.display = 'none');

        // Add 'selected' class to the selected menu item
        const selectedItem = document.getElementById(targetId.replace('-content', ''));
        if (selectedItem) {
            selectedItem.classList.add('selected');
        }

        // Show the target content
        const targetContent = document.getElementById(targetId);
        if (targetContent) {
            targetContent.style.display = 'block';
        }
    }

    // Check localStorage for the last selected item
    const lastSelected = localStorage.getItem('lastSelected') || 'tareas-content';
    showContent(lastSelected);

    menu.addEventListener('click', function (e) {
        if (e.target && e.target.closest('p')) {
            const li = e.target.closest('p');
            const targetId = li.id + '-content';

            // Save the selected item to localStorage
            localStorage.setItem('lastSelected', targetId);

            // Show the target content
            showContent(targetId);
        }
    });
});
</script>