var seleccionado = 1;

$("#listado-menu ul li a").click(function() {

    $("#listado-menu ul li a").removeClass("seleccionado");

    $(this).addClass("seleccionado");
    var seleccionado = 2;
});

if (seleccionado = true) {
    $("#listado-menu ul li a").click(function() {

        $("#listado-menu ul li a").removeClass("seleccionado");

        $(this).addClass("seleccionado");
    });
}