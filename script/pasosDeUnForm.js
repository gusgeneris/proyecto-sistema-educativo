function mostrarPaso2() {

    var paso1 = document.getElementById("paso1").style.display = "none";
    document.getElementById("cabeceraPaso1").style.backgroundColor = "grey"

    var paso2 = document.getElementById("paso2").style.display = "inline";

    document.getElementById("cabeceraPaso2").style.backgroundColor = "aquamarine"

}

function mostrarPasoFinal() {

    var paso1 = document.getElementById("paso2").style.display = "none";

    document.getElementById("cabeceraPaso2").style.backgroundColor = "grey"

    var paso2 = document.getElementById("pasoFinal").style.display = "inline";

    document.getElementById("cabeceraPaso3").style.backgroundColor = "aquamarine"

}

function presentarContenido() {

    var anios = document.getElementById("Anios").value
    var nombre = document.getElementById("NombreCarrera").value

    document.getElementById("anios").innerHTML = "Duracion en Años: " + anios;
    document.getElementById("nombre").innerHTML = "Nombre de la Carrera: " + nombre;




}

function atras1() {

    var paso2 = document.getElementById("paso2").style.display = "none";
    var paso1 = document.getElementById("paso1").style.display = "block";

}

function atras2() {

    var paso1 = document.getElementById("paso2").style.display = "block";
    var paso2 = document.getElementById("pasoFinal").style.display = "none";

}