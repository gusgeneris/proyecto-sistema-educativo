window.onload = function test() {
    var tabla = $("#tablaAsistencia tr")

    var fila = "";

    tabla.each(function() {

        fila = $(this);

        var element = fila.find("td:eq(5)");
        console.log(element);


        if ($.trim(element.text()) >= 75) {

            element.css("background-color", "green");
            element.css("color", "white");

        } else(
            element.css("background-color", "orange")
        )

    })
}