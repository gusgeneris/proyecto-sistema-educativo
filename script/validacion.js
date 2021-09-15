const tableta = document.getElementById('table');

function validarInsertForm() {

    var formulario = document.getElementById("formInsert");

    var nombre = document.getElementById("txtNombre").value;

    var mensajeError = [];

    var error = document.getElementById("error");

    var sexo = document.getElementById("cboSexo").value;

    var apellido = document.getElementById("txtApellido").value;

    if (nombre.trim() == '') {
        mensajeError.push("-Error campo nombre vacio <br>");
        error.innerHTML = mensajeError;
        return false
    }

    if (nombre.length < 3) {
        mensajeError.push("-Error el nombre es demaciado corto <br>");
        error.innerHTML = mensajeError;
        return false;
    }

    if (apellido.trim() == '') {
        mensajeError.push("-Error campo apellido vacio <br>");
        error.innerHTML = mensajeError;
        return false;
    }

    if (apellido.length < 3) {
        mensajeError.push("-Error el apellido es demaciado corto <br>");
        error.innerHTML = mensajeError;
        return false;
    }

    if (sexo == 'NULL') {
        mensajeError.push("-Se necesita que se cargue el campo Sexo")
        error.innerHTML = mensajeError;
        return false;
    }


}