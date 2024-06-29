document.addEventListener("DOMContentLoaded", function () {
    // Obtener la URL actual
    var currentUrl = window.location.pathname;

    // Obtener el elemento donde se agregarán los breadcrumbs
    var breadcrumbsContainer = document.getElementById("breadcrumbs");

    // Array para almacenar los elementos de breadcrumb
    var breadcrumbs = [];

    // Dividir la URL actual por '/'
    var urlParts = currentUrl.split("/").filter(function (part) {
        return part !== ""; // Eliminar partes vacías
    });

    // Construir cada elemento de breadcrumb
    urlParts.forEach(function (part, index) {
        // Construir la URL hasta el elemento actual
        var breadcrumbUrl = "/" + urlParts.slice(0, index + 1).join("/");

        // Construir el elemento de breadcrumb
        var breadcrumbItem = document.createElement("li");
        breadcrumbItem.className = "breadcrumb-item text-sm";

        // Si es el último elemento, marcarlo como activo
        if (index === urlParts.length - 1) {
            breadcrumbItem.innerHTML =
                '<span class="opacity-5 text-dark">' + part + "</span>";
            breadcrumbItem.classList.add("active");
            breadcrumbItem.setAttribute("aria-current", "page");
        } else {
            breadcrumbItem.innerHTML =
                '<a class="opacity-5 text-dark" href="' +
                breadcrumbUrl +
                '">' +
                part +
                "</a>";
        }

        // Agregar el elemento de breadcrumb al array
        breadcrumbs.push(breadcrumbItem);
    });

    // Limpiar el contenedor actual de breadcrumbs
    breadcrumbsContainer.innerHTML = "";

    // Agregar cada elemento de breadcrumb al contenedor
    breadcrumbs.forEach(function (breadcrumb) {
        breadcrumbsContainer.appendChild(breadcrumb);
    });
});
