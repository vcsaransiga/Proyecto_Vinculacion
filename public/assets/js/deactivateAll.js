function initializeDeactivateAll(options) {
    $(function (e) {
        $(options.selectAllId).click(function () {
            $(options.checkboxClass).prop('checked', $(this).prop('checked'));
        });

        $(options.deactivateButtonId).click(function (e) {
            e.preventDefault();

            // Mensaje de confirmación
            if (!confirm("¿Estás seguro de que deseas eliminar los elementos seleccionados?")) {
                return;
            }

            const all_ids = [];
            $(`${options.checkboxClass}:checked`).each(function () {
                all_ids.push($(this).val());
                console.log(`ID seleccionado: ${$(this).val()}`);
            });

            if (all_ids.length === 0) {
                // Mostrar el mensaje de error
                $('#message-error').removeClass('tw-hidden').addClass('tw-block');
                $('#message-text-error').text('No se ha seleccionado ningún registro.');
                return;
            }

            console.log(`IDs a desactivar: ${all_ids}`);

            $.ajax({
                url: options.deactivateUrl,
                type: "PATCH",
                data: {
                    ids: all_ids,
                    _token: options.csrfToken
                },
                success: function (response) {
                    if (response.success) {
                        // Mostrar el mensaje de éxito
                        $('#message-success').removeClass('tw-hidden').addClass('tw-block');
                        $('#message-text-success').text(response.success);
                        console.log('Desactivación exitosa:', response.success);

                        // Recargar la página después de 2 segundos
                        setTimeout(function () {
                            location.reload();
                        }, 1000);
                    }
                },
                error: function (xhr, status, error) {
                    console.error('Error al desactivar los elementos seleccionados:', error);
                    console.error('Detalles del error:', xhr, status);
                    alert('Error al desactivar los elementos seleccionados');
                }
            });
        });
    });
}
