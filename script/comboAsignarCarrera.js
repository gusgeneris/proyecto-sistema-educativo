function cargarCarrera() {
    var cboCicloLectivo = $('#cboCicloLectivo');


    var idCicloLectivo = (cboCicloLectivo.val());

    $.ajax({
        url: 'cargarCarrera.php',
        method: 'GET',
        data: {
            id: idCicloLectivo
        }
    })

    .done(function(respuesta) {
        $('#cboCarrera').html(respuesta);
    })

    .fail(function() {
        alert('error');
    })
}