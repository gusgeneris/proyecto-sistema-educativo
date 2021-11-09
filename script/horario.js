/*window.onload = function test() {
    var tabla = $("#tablaHorarios tr")

    var diasSemana = new Array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
    var f = new Date();

    var diaActual = diasSemana[f.getDay()]
    var numeroDia = "";

    switch (diaActual) {
        case "Lunes":
            numeroDia = "1"
            break;
        case "Martes":
            numeroDia = "2"
            break;
        case "Miércoles":
            numeroDia = "3"
            break;
        case "Jueves":
            numeroDia = "4"
            break;
        case "Viernes":
            numeroDia = "5"
            break;

    }

    var fila = "";

    tabla.each(function() {

        fila = $(this);

        var element = fila.find(diaActual);

        console.log(element);


        if ($.trim(element.text()) == diaActual) {

            element.css("background-color", "green");
            element.css("color", "white");

        } else(
            element.css("background-color", "orange")
        )

    })
}*/