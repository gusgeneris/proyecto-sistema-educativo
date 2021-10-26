function cargarMaterias() {

    var cboCarrera = $('#cboCarrera');


    var idCarrera = (cboCarrera.val());

    $.ajax({
        url: 'cargarMateria.php',
        method: 'GET',
        data: {
            id: idCarrera
        }
    })

    .done(function(respuesta) {
        $('#cboMateria').html(respuesta);
    })

    .fail(function() {
        alert('error');
    })

}

function cargarNumeroClase() {
    var cboCarrera = $('#cboCarrera')

    var idCarrera = (cboCarrera.val());

    var cboMateria = $('#cboMateria')

    var idMateria = (cboMateria.val());

    $.ajax({
        url: 'numeroClase.php',
        method: 'GET',
        data: {
            idCarrera: idCarrera,
            idMateria: idMateria
        }
    })

    .done(function(respuesta) {
        $('#numeroClase').val(respuesta);
    })

    .fail(function() {
        alert('error');
    })

}