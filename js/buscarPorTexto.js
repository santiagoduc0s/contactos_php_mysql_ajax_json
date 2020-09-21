$(document).ready(function () {

    mostrarContactos();

    $('#texSearch').keyup(function () {
        let text = $('#texSearch').val();
        let action = 'searchContactText';
        let tBody = document.getElementById('rowsContact');
        let data = '';
        let jsonData = '';

        $.ajax({
            url: 'ajaxData.php',
            type: 'POST',
            async: true,
            data: {
                action: action,
                text: text
            },
            beforeSend: function () {
            },
            success: function (response) {
                if (response != 'not data') {
                    jsonData = JSON.parse(response);
                    jsonData.forEach(function (contacto) {
                        data += `
                            <tr>
                                <th scope="row">${contacto.id_contacto}</th>
                                <td>${contacto.nombre}</td>
                                <td>${contacto.apellido}</td>
                                <td>${contacto.telefono}</td>
                                <td>${contacto.email}</td>
                            </tr>
                        `;
                    });
                    tBody.innerHTML = data;
                } else {
                    tBody.innerHTML = 'No hay coincidencias';
                }
            },
            error: function (error) {
                alert('Ha ocurrido un error, vuelva a intentarlo');
            }
        });
    });
});