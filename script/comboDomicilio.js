function cargarProvincia() {

    var cboPais = $('#cboPais');


    var idPais = (cboPais.val());

    $.ajax({
        url: 'cargarProvincias.php',
        method: 'GET',
        data: {
            id: idPais
        }
    })

    .done(function(respuesta) {
        $('#cboProvincia').html(respuesta);
    })

    .fail(function() {
        alert('error');
    })

}

function cargarLocalidad() {
    var cboProvincia = $('#cboProvincia');

    var idProvincia = (cboProvincia.val());


    $.ajax({
        url: 'cargarLocalidad.php',
        method: 'GET',
        data: {
            id: idProvincia
        }
    })

    .done(function(respuesta) {
        $('#cboLocalidad').html(respuesta);
    })

    .fail(function() {
        alert('error');
    })
}

function cargarBarrio() {
    var cboLocalidad = $('#cboLocalidad');

    var idLocalidad = (cboLocalidad.val());


    $.ajax({
        url: 'cargarBarrio.php',
        method: 'GET',
        data: {
            id: idLocalidad
        }
    })

    .done(function(respuesta) {
        $('#cboBarrio').html(respuesta);
    })

    .fail(function() {
        alert('error');
    })
}