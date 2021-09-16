const formulario = document.getElementById('formInsert');

const inputs = document.querySelectorAll('#formInsert input');

<<<<<<< HEAD
const selects = document.querySelectorAll('#formInsert select');

=======
>>>>>>> 9dbcb0807d65d560263e4aeb0ec99bfaaca0b780
const expresiones = {
    usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
    nombre: /^[a-zA-ZÀ-ÿ\s]{3,40}$/, // Letras y espacios, pueden llevar acentos.
    nombreMateria: /^[a-zA-Z0-9_ ]*$/,
    apellido: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
    contrasenia: /^.{4,12}$/, // 4 a 12 digitos.
    correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
    dni: /^\d{7,14}$/, // 7 a 14 numeros.
    numeros: /^\d{7,14}$/, // 7 a 14 numeros.
    anio: /^\d{4}$/,
    anios: /^\d{1}$/,
    especialidad: /^[a-zA-Z_ ]*$/,
    barrio: /^[a-zA-Z0-9_ ]*$/,
<<<<<<< HEAD
    contacto: /^[a-zA-Z0-9_.+-@]{3,40}$/,
    detalleDomicilio: /^[a-zA-Z0-9_ ]*$/,
    cboSelect: /^[1-9]{1,3}$/
=======
    contacto: /^[a-zA-Z0-9_.+-@]{3,40}$/
>>>>>>> 9dbcb0807d65d560263e4aeb0ec99bfaaca0b780
}

const campos = {
    Nombre: false,
    Apellido: false,
    Dni: false,
    Nacionalidad: false,
    NumeroLegajo: false,
    NumeroMatricula: false,
    CicloLectivo: false,
    NombreUsuario: false,
    Contrasenia: false,
    Perfil: false,
    Anios: false,
    NombreMateria: false,
    Especialidad: false,
    Barrio: false,
    Pais: false,
    Provincia: false,
    Localidad: false,
<<<<<<< HEAD
    Contacto: false,
    TipoContacto: false,
    DetalleDomicilio: false,
    cboPais: false,
    cboProvincia: false,
    cboLocalidad: false,
    cboBarrio: false,
    cboSexo: false,
    cboPerfil: false
=======
    Contacto: false
>>>>>>> 9dbcb0807d65d560263e4aeb0ec99bfaaca0b780

}

const validarFormulario = (e) => {
    switch (e.target.name) { //se identifica el nombre del donde se desencadena el evento para poder manipular su contenido//
        case "Nombre":
            validarCampo(expresiones.nombre, e.target, 'Nombre')
            break;
        case "Apellido":
            validarCampo(expresiones.apellido, e.target, 'Apellido')
            break;
        case "Dni":
            validarCampo(expresiones.dni, e.target, 'Dni')
            break;
        case "Nacionalidad":
            validarCampo(expresiones.nombre, e.target, 'Nacionalidad')
            break;
        case "NumeroLegajo":
            validarCampo(expresiones.numeros, e.target, 'NumeroLegajo')
            break;
        case "NumeroMatricula":
            validarCampo(expresiones.numeros, e.target, 'NumeroMatricula')
            break;
        case "NombreUsuario":
            validarCampo(expresiones.nombre, e.target, 'NombreUsuario')
            break;
        case "Contrasenia":
            validarCampo(expresiones.contrasenia, e.target, 'Contrasenia')
            validarContrasenia2();
            break;
        case "Contrasenia2":
            validarContrasenia2();
            break;
        case "CicloLectivo":
            validarCampo(expresiones.anio, e.target, 'CicloLectivo')
            break;
        case "Perfil":
            validarCampo(expresiones.nombre, e.target, 'Perfil')
            break;
        case "Anios":
            validarCampo(expresiones.anios, e.target, 'Anios')
            break;
        case "NombreMateria":
            validarCampo(expresiones.nombreMateria, e.target, 'NombreMateria')
            break;
        case "Especialidad":
            validarCampo(expresiones.especialidad, e.target, 'Especialidad')
            break;
        case "Barrio":
            validarCampo(expresiones.barrio, e.target, 'Barrio')
            break;
        case "Pais":
            validarCampo(expresiones.nombre, e.target, 'Pais')
            break;
        case "Provincia":
            validarCampo(expresiones.nombre, e.target, 'Provincia')
            break;
        case "Localidad":
            validarCampo(expresiones.nombre, e.target, 'Localidad')
            break;
        case "Contacto":
            validarCampo(expresiones.contacto, e.target, 'Contacto')
            break;
        case "TipoContacto":
            validarCampo(expresiones.nombre, e.target, 'TipoContacto')
            break;
<<<<<<< HEAD
        case "DetalleDomicilio":
            validarCampo(expresiones.detalleDomicilio, e.target, 'DetalleDomicilio')
            break;
        case "cboPais":
            validarCampo(expresiones.cboSelect, e.target, 'cboPais')
            break;
        case "cboProvincia":
            validarCampo(expresiones.cboSelect, e.target, 'cboProvincia')
            break;
        case "cboLocalidad":
            validarCampo(expresiones.cboSelect, e.target, 'cboLocalidad')
            break;
        case "cboBarrio":
            validarCampo(expresiones.cboSelect, e.target, 'cboBarrio')
            break;
        case "cboSexo":
            validarCampo(expresiones.cboSelect, e.target, 'cboSexo')
            break;
        case "cboPerfil":
            validarCampo(expresiones.cboSelect, e.target, 'cboPerfil')
            break;
    }
}


=======


    }
}

>>>>>>> 9dbcb0807d65d560263e4aeb0ec99bfaaca0b780
const validarCampo = (expresion, input, campo) => { //expresion hace referencia a las expresiones regulares antes definidas, el input hace referencia al evento que en este caso es target, el campo es el lugar //
    if (expresion.test(input.value)) { //e.target.valu (es el valor)- comparamos de este modo la constante expreciones del tipo nombre adjuntando .test para saber si cumple con la EXR
        document.getElementById(`Grupo${campo}`).classList.remove("formGrupIncorrect"); //Grupo${campo}== a GrupoNombre en el primer input|Se elimina la clase de icorrecto al refrescar
        document.getElementById(`Grupo${campo}`).classList.add("formGrupCorrect");
        /*document.getElementById(`formValidacionEst`).src = "../../image/iconCheck.png";*/
        document.querySelector(`#Grupo${campo} .formularioInputError`).classList.remove("formularioInputError-activo")
        campos[campo] = true;

    } else {
        document.getElementById(`Grupo${campo}`).classList.add("formGrupIncorrect") //con classList.add pedimos agregar una clase definida ya en nuestra hoja de css
            /*document.getElementById("formValidacionEst").src = "../../image/iconError.png";*/
        document.querySelector(`#Grupo${campo} .formularioInputError`).classList.add("formularioInputError-activo")
        campos[campo] = false;
    }
}

const validarContrasenia2 = () => {
    const inputContrasenia1 = document.getElementById('Contrasenia');
    const inputContrasenia2 = document.getElementById('Contrasenia2');

    if (inputContrasenia1.value !== inputContrasenia2.value) {
        document.getElementById(`GrupoContrasenia2`).classList.add('formGrupIncorrect');
        document.getElementById(`GrupoContrasenia2`).classList.remove('formGrupCorrect');
        document.querySelector(`#GrupoContrasenia2 .formularioInputError`).classList.add('formularioInputError-activo');
        campos['Contrasenia'] = false;
    } else {
        document.getElementById(`GrupoContrasenia2`).classList.remove('formGrupIncorrect');
        document.getElementById(`GrupoContrasenia2`).classList.add('formGrupCorrect');
        document.querySelector(`#GrupoContrasenia2 .formularioInputError`).classList.remove('formularioInputError-activo');
        campos['Contrasenia'] = true;
    }
}

inputs.forEach((input) => {
<<<<<<< HEAD
    input.addEventListener('keyup', (validarFormulario));
    input.addEventListener('blur', (validarFormulario));
})

selects.forEach((select) => {
    select.addEventListener('change', (validarFormulario));
})
=======
    input.addEventListener('keyup', (validarFormulario))
    input.addEventListener('blur', (validarFormulario))
})

>>>>>>> 9dbcb0807d65d560263e4aeb0ec99bfaaca0b780



formulario.addEventListener('submit', (e) => {
    e.preventDefault();

    switch (document.getElementById('Guardar').value) {
        case 'FormInsertAlumnos':

<<<<<<< HEAD
            if (campos.Nombre && campos.Apellido && campos.Dni && campos.Nacionalidad && campos.NumeroLegajo && campos.cboSexo) {
=======
            if (campos.Nombre && campos.Apellido && campos.Dni && campos.Nacionalidad && campos.NumeroLegajo) {
>>>>>>> 9dbcb0807d65d560263e4aeb0ec99bfaaca0b780

                formulario.submit();
            } else {
                document.getElementById('GrupoMensaje').classList.add("formMensaje-activo");
            }
        case 'FormInsertDocente':
<<<<<<< HEAD
            if (campos.Nombre && campos.Apellido && campos.Dni && campos.Nacionalidad && campos.NumeroMatricula && campos.cboSexo) {
=======
            if (campos.Nombre && campos.Apellido && campos.Dni && campos.Nacionalidad && campos.NumeroMatricula) {
>>>>>>> 9dbcb0807d65d560263e4aeb0ec99bfaaca0b780

                formulario.submit();
            } else {
                document.getElementById('GrupoMensaje').classList.add("formMensaje-activo");
            }
        case 'FormInsertUsuario':
<<<<<<< HEAD
            if (campos.Nombre && campos.Apellido && campos.Dni && campos.Nacionalidad && campos.Contrasenia && campos.NombreUsuario && campos.cboSexo && cboPerfil) {
=======
            if (campos.Nombre && campos.Apellido && campos.Dni && campos.Nacionalidad && campos.Contrasenia && campos.NombreUsuario) {
>>>>>>> 9dbcb0807d65d560263e4aeb0ec99bfaaca0b780
                formulario.submit();
            } else {

                document.getElementById('GrupoMensaje').classList.add("formMensaje-activo");
            }
        case 'FormInsertCicloLectivo':
            if (campos.CicloLectivo) {

                formulario.submit();
            } else {
                document.getElementById('GrupoMensaje').classList.add("formMensaje-activo");
            }
        case 'FormInsertPerfil':
            if (campos.Nombre) {

                formulario.submit();
            } else {
                document.getElementById('GrupoMensaje').classList.add("formMensaje-activo");
            }
        case 'FormInsertCarrera':
            if (campos.Nombre && campos.Anios) {

                formulario.submit();
            } else {
                document.getElementById('GrupoMensaje').classList.add("formMensaje-activo");
            }
        case 'FormInsertMateria':
            if (campos.NombreMateria) {

                formulario.submit();
            } else {
                document.getElementById('GrupoMensaje').classList.add("formMensaje-activo");
            }
        case 'FormInsertEspecialidad':
            if (campos.Especialidad) {

                formulario.submit();
            } else {
                document.getElementById('GrupoMensaje').classList.add("formMensaje-activo");
            }
        case 'FormInsertBarrio':
            if (campos.Barrio) {

                formulario.submit();
            } else {
                document.getElementById('GrupoMensaje').classList.add("formMensaje-activo");
            }
        case 'FormInsertPais':
            if (campos.Pais) {

                formulario.submit();
            } else {
                document.getElementById('GrupoMensaje').classList.add("formMensaje-activo");
            }
        case 'FormInsertProvincia':
            if (campos.Provincia) {

                formulario.submit();
            } else {
                document.getElementById('GrupoMensaje').classList.add("formMensaje-activo");
            }
        case 'FormInserLocalidad':
            if (campos.Localidad) {

                formulario.submit();
            } else {
                document.getElementById('GrupoMensaje').classList.add("formMensaje-activo");
            }
        case 'FormInserContacto':
            if (campos.Contacto) {

                formulario.submit();
            } else {
                document.getElementById('GrupoMensaje').classList.add("formMensaje-activo");
            }
        case 'FormInserTipoContacto':
            if (campos.Nombre) {

                formulario.submit();
            } else {
                document.getElementById('GrupoMensaje').classList.add("formMensaje-activo");
            }
<<<<<<< HEAD
        case 'FormInsertDetalleDomicilio':
            if (campos.DetalleDomicilio) {

                formulario.submit();
            } else {
                document.getElementById('GrupoMensaje').classList.add("formMensaje-activo");
            }
=======
>>>>>>> 9dbcb0807d65d560263e4aeb0ec99bfaaca0b780
    }

})