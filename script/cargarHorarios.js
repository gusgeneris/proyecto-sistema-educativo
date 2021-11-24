function cargarHorario() {

    var cboDia = $('#cboDia');


    var idDia = (cboDia.val());

    $.ajax({
        url: 'cargarHorarioDia.php',
        method: 'GET',
        data: {
            id: idDia
        }
    })

    .done(function(respuesta) {
        $('#cuerpoTablaHorario').html(respuesta);
    })

    .fail(function() {
        alert('error');
    })

}