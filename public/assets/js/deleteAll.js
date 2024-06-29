function initializeDeleteAll(options) {
    $(function (e) {
        $(options.selectAllId).click(function () {
            $(options.checkboxClass).prop('checked', $(this).prop('checked'));
        });

        $(options.deleteButtonId).click(function (e) {
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

            console.log(`IDs a eliminar: ${all_ids}`);

            $.ajax({
                url: options.deleteUrl,
                type: "DELETE",
                data: {
                    ids: all_ids,
                    _token: options.csrfToken
                },
                success: function (response) {
                    $.each(all_ids, function (key, val) {
                        $(`${options.rowIdPrefix}${val}`).remove();
                    });
                    // Mostrar el mensaje de éxito
                    $('#message').removeClass('tw-hidden').addClass('tw-block');
                    $('#message-text').text(response.success);
                    console.log('Eliminación exitosa:', response.success);
                },
                error: function (xhr, status, error) {
                    console.error('Error al eliminar los elementos seleccionados:', error);
                    console.error('Detalles del error:', xhr, status);
                    alert('Error al eliminar los elementos seleccionados');
                }
            });
        });
    });
}
