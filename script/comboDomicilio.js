<<<<<<< HEAD
function prueba() {
    alert(document.getElementById("cboPais").value);
    exit;

}

=======
>>>>>>> 9dbcb0807d65d560263e4aeb0ec99bfaaca0b780
function cargarProvincia() {

    var cboPais = $('#cboPais');

<<<<<<< HEAD
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
=======
    var idProvincia = (cboProvincia.val());

    $.ajax({
        url: 'cargarProvincias.php',
        method: 'GET',
        data: {
            idProvincia: idProvincia
>>>>>>> 9dbcb0807d65d560263e4aeb0ec99bfaaca0b780
        }
    })

    .done(function(respuesta) {
<<<<<<< HEAD
        $('#cboLocalidad').html(respuesta);
=======
        $('#cargarProvincias').html(respuesta);
>>>>>>> 9dbcb0807d65d560263e4aeb0ec99bfaaca0b780
    })

    .fail(function() {
        alert('error');
    })
<<<<<<< HEAD
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
=======

>>>>>>> 9dbcb0807d65d560263e4aeb0ec99bfaaca0b780
}