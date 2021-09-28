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

function cargarMateria() {
    var cboCicloLectivo = $("#cboCicloLectivo");
    var cboCarrera = $("#cboCarrera");


    var idcboCiclo = (cboCicloLectivo.val());

    var idcboCarrera = (cboCarrera.val());


    $.ajax({
        type: "GET",
        url: "cargarMateria.php",
        //data: {"selected=" + selected, "selected2=" + selected},
        data: { idCiclo: idcboCiclo, idCarrera: idcboCarrera }
    })

    .done(function(respuesta) {
        $('#cboMateria').html(respuesta);
    })

    .fail(function() {
        alert('error');
    })
}