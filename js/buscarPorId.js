$(document).ready(function () { // DOMLoadedContent.

    mostrarContactos();
    
    $('#btnSearch').click(function () { // addEventListener
        let id = $('#numSearch').val(); // getElementById
        let action = 'searchContactId';
        let tBody = document.getElementById('rowsContact');
        let idSearch = document.getElementById('numSearch');
        let data = '';
        let jsonData = '';

        if (id != '' && id > 0) {
            $.ajax({
                url: 'ajaxData.php',
                type: 'POST',
                async: true,
                data: {
                    action: action,
                    id_contacto: id
                },
                beforeSend: function () {

                },
                success: function (response) {
                    if (response != 'not data') {
                        jsonData = JSON.parse(response); // con JQuery => $.parseJSON()

                        data = `
                            <tr>
                                <th scope="row">${jsonData.id_contacto}</th>
                                <td>${jsonData.nombre}</td>
                                <td>${jsonData.apellido}</td>
                                <td>${jsonData.telefono}</td>
                                <td>${jsonData.email}</td>
                            </tr>
                        `;

                        tBody.innerHTML = data; // $('#rowsContact').html(data);
                        idSearch.value = '';
                    } else {
                        tBody.innerHTML = '';
                        idSearch.value = '';
                        alert('No hay contactos con ese id');
                    }
                },
                error: function (error) {
                    alert('Ha ocurrido un error, vuelva a intentarlo');
                }
            });
        } else {
            idSearch.value = '';
            alert('Faltan completar campos o el id ingresado es menor a 1');
        }
    });
});