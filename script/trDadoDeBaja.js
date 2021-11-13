window.onload = function test() {
    var tabla = $("#table tr")

    var fila = "";

    tabla.each(function() {

        fila = $(this);

        var element = fila.find("td:eq(10)");
        console.log(element);


        if ($.trim(element.text()) == "Activo") {

            element.css("background-color", "green");
            element.css("color", "white");

        } else(
            element.css("background-color", "orange")

        )

    })
}