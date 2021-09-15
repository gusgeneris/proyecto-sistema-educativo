function cargarProvincia() {

    var cboPais = $('#cboPais');

    var idProvincia = (cboProvincia.val());

    $.ajax({
        url: 'cargarProvincias.php',
        method: 'GET',
        data: {
            idProvincia: idProvincia
        }
    })

    .done(function(respuesta) {
        $('#cargarProvincias').html(respuesta);
    })

    .fail(function() {
        alert('error');
    })

}