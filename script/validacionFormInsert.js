const formulario = document.getElementById('formInsert');

const inputs = document.querySelectorAll('#formInsert input');

const textareas = document.querySelectorAll('#formInsert textarea');

const selects = document.querySelectorAll('#formInsert select');

const expresiones = {
    usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
    nombre: /^[a-zA-ZÀ-ÿ\s ]{3,40}$/, // Letras y espacios, pueden llevar acentos.
    nombreCarrera: /^[a-zA-Z0-9_ ]{8,}$/,
    nombreMateria: /^[a-zA-Z0-9_ ]{3,}$/,
    apellido: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
    contrasenia: /^.{4,12}$/, // 4 a 12 digitos.
    correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-. ]+$/,
    dni: /^\d{7,14}$/, // 7 a 14 numeros.
    numeros: /^\d{7,14}$/, // 7 a 14 numeros.
    fecha: /^\d{4}([\-/.])(0?[1-9]|1[1-2])\1(3[01]|[12][0-9]|0?[1-9])$/,
    anio: /^\d{4}$/,
    anios: /^\d{1}$/,
    especialidad: /^[a-zA-Z_ ]*$/,
    barrio: /^[a-zA-Z0-9_ ]*$/,
    localidad: /^[a-zA-Z0-9_ ]*$/,
    pais: /^[a-zA-ZÀ-ÿ\s]{3,40}$/,
    contacto: /^[a-zA-Z0-9 _.+-@]{3,40}$/,
    detalleDomicilio: /^[a-zA-Z0-9_ ]*$/,
    cboSelect: /^[1-9]{1,3}$/,
    numClase: /^\d{1,100}$/,
    hora: /^([01]?[0-9]|2[0-3]):[0-5][0-9]$/,
    numero: /^\d{1}$/,
    nombreUsuario: /^[a-zA-Z0-9_.+-@]{3,40}$/,
    observaciones: /^[a-zA-Z0-9_ ]{1,}$/,
    temaDia: /^[a-zA-Z0-9_ ]{1,}$/
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
    Contacto: false,
    TipoContacto: false,
    DetalleDomicilio: false,
    cboPais: false,
    cboProvincia: false,
    cboLocalidad: false,
    cboBarrio: false,
    cboSexo: false,
    cboPerfil: false,
    cboDocente: false,
    cboCicloLectivo: false,
    cboCarrera: false,
    cboMateria: false,
    DetalleAnio: false,
    DetallePeriodo: false,
    NumClase: false,
    NombreCarrera: false,
    Fecha: false,
    cboPeriodoDesarrollo: false,
    cboAnioDesarrollo: false,
    cboDia: false,
    HoraInicio: false,
    HoraFin: false,
    Numero: false,
    Modulo: false,
    observaciones: false,
    temaDia: false


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
            validarCampo(expresiones.nombreUsuario, e.target, 'NombreUsuario')
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
        case "NombreCarrera":
            validarCampo(expresiones.nombreCarrera, e.target, 'NombreCarrera')
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
            validarCampo(expresiones.localidad, e.target, 'Localidad')
            break;
        case "Contacto":
            validarCampo(expresiones.contacto, e.target, 'Contacto')
            break;
        case "TipoContacto":
            validarCampo(expresiones.nombre, e.target, 'TipoContacto')
            break;
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

        case "cboCarrera":
            validarCampo(expresiones.cboSelect, e.target, 'cboCarrera')
            break;
        case "cboMateria":
            validarCampo(expresiones.cboSelect, e.target, 'cboMateria')
            break;
        case "DetalleAnio":
            validarCampo(expresiones.nombre, e.target, 'DetalleAnio')
            break;
        case "DetallePeriodo":
            validarCampo(expresiones.nombre, e.target, 'DetallePeriodo')
            break;
        case "NumClase":
            validarCampo(expresiones.numClase, e.target, 'NumClase')
            break;
        case "Fecha":
            validarCampo(expresiones.fecha, e.target, 'Fecha')
            break;
        case "cboAnioDesarrollo":
            validarCampo(expresiones.cboSelect, e.target, 'cboAnioDesarrollo')
            break;
        case "cboPeriodoDesarrollo":
            validarCampo(expresiones.cboSelect, e.target, 'cboPeriodoDesarrollo')
            break;
        case "cboDocente":
            validarCampo(expresiones.cboSelect, e.target, 'cboDocente')
            break;
        case "HoraInicio":
            validarCampo(expresiones.hora, e.target, 'HoraInicio')
            break;
        case "HoraFin":
            validarCampo(expresiones.hora, e.target, 'HoraFin')
            break;
        case "Numero":
            validarCampo(expresiones.numero, e.target, 'Numero')
            break;
        case "cboDia":
            validarCampo(expresiones.cboSelect, e.target, 'cboDia')
            break;
        case "cboCicloLectivo":
            validarCampo(expresiones.cboSelect, e.target, 'cboCicloLectivo')
            break;
        case "Modulo":
            validarCampo(expresiones.nombre, e.target, 'Modulo')
            break;
        case "cboTipoClase":
            validarCampo(expresiones.cboSelect, e.target, 'cboTipoClase')
            break;

        case "cboTipoContacto":
            validarCampo(expresiones.cboSelect, e.target, 'cboTipoContacto')
            break;
        case "observaciones":
            validarCampo(expresiones.observaciones, e.target, 'observaciones')
            break;
        case "temaDia":
            validarCampo(expresiones.temaDia, e.target, 'temaDia')
            break;

    }
}


const validarCampo = (expresion, input, campo) => { //expresion hace referencia a las expresiones regulares antes definidas, el input hace referencia al evento que en este caso es target, el campo es el lugar //
    if (expresion.test(input.value)) { //e.target.valu (es el valor)- comparamos de este modo la constante expreciones del tipo nombre adjuntando .test para saber si cumple con la EXR
        document.getElementById(`Grupo${campo}`).classList.remove("formGrupIncorrect"); //Grupo${campo}== a GrupoNombre en el primer input|Se elimina la clase de icorrecto al refrescar
        document.getElementById(`Grupo${campo}`).classList.add("formGrupCorrect");
        /*document.getElementById(`formValidacionEst`).src = "../../image/iconCheck.png";*/
        document.querySelector(`#Grupo${campo} .formularioInputError`).classList.remove("formularioInputError-activo");
        campos[campo] = true;


    } else {
        document.getElementById(`Grupo${campo}`).classList.add("formGrupIncorrect") //con classList.add pedimos agregar una clase definida ya en nuestra hoja de css
            /*document.getElementById("formValidacionEst").src = "../../image/iconError.png";*/
        document.querySelector(`#Grupo${campo} .formularioInputError`).classList.add("formularioInputError-activo");
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
    input.addEventListener('keyup', (validarFormulario));
    input.addEventListener('blur', (validarFormulario));
})

textareas.forEach((input) => {
    input.addEventListener('keyup', (validarFormulario));
    input.addEventListener('blur', (validarFormulario));
})
selects.forEach((select) => {
    select.addEventListener('change', (validarFormulario));
})




formulario.addEventListener('submit', (e) => {
    e.preventDefault();

    switch (document.getElementById('Guardar').value) {


        case 'FormInsertAlumnos':

            if (campos.Nombre && campos.Apellido && campos.Dni && campos.Nacionalidad && campos.NumeroLegajo && campos.cboSexo) {

                formulario.submit();
                break;
            } else {
                document.getElementById('GrupoMensaje').classList.add("formMensaje-activo");
            }
        case 'FormInsertDocente':
            if (campos.Nombre && campos.Apellido && campos.Dni && campos.Nacionalidad && campos.NumeroMatricula && campos.cboSexo) {

                formulario.submit();
                exit;
            } else {
                document.getElementById('GrupoMensaje').classList.add("formMensaje-activo");
            }
        case 'FormInsertUsuario':
            if (campos.Nombre && campos.Apellido && campos.Dni && campos.Nacionalidad && campos.Contrasenia && campos.NombreUsuario && campos.cboSexo && cboPerfil) {
                formulario.submit();
                exit;
            } else {

                document.getElementById('GrupoMensaje').classList.add("formMensaje-activo");
            }
        case 'FormInsertCicloLectivo':
            if (campos.CicloLectivo) {

                formulario.submit();
                exit;
            } else {
                document.getElementById('GrupoMensaje').classList.add("formMensaje-activo");
            }
        case 'FormInsertPerfil':
            if (campos.Nombre) {

                formulario.submit();
                exit;
            } else {
                document.getElementById('GrupoMensaje').classList.add("formMensaje-activo");
            }
        case 'FormInsertCarrera':
            if (campos.NombreCarrera && campos.Anios) {

                formulario.submit();
                exit;
            } else {
                document.getElementById('GrupoMensaje').classList.add("formMensaje-activo");
            }
        case 'FormInsertMateria':
            if (campos.NombreMateria) {

                formulario.submit();
                exit;
            } else {
                document.getElementById('GrupoMensaje').classList.add("formMensaje-activo");
            }
        case 'FormInsertEspecialidad':
            if (campos.Especialidad) {

                formulario.submit();
                exit;
            } else {
                document.getElementById('GrupoMensaje').classList.add("formMensaje-activo");
            }
        case 'FormInsertBarrio':
            if (campos.Barrio) {

                formulario.submit();
                exit;
            } else {
                document.getElementById('GrupoMensaje').classList.add("formMensaje-activo");
            }
        case 'FormInsertPais':
            if (campos.Pais) {

                document.getElementById('GrupoMensaje').classList.remove("formMensaje-activo");

                formulario.submit();
                exit;
            } else {
                document.getElementById('GrupoMensaje').classList.add("formMensaje-activo");
            }
        case 'FormInsertProvincia':
            if (campos.Provincia) {

                formulario.submit();
                exit;
            } else {
                document.getElementById('GrupoMensaje').classList.add("formMensaje-activo");
            }
        case 'FormInsertLocalidad':
            if (campos.Localidad) {

                formulario.submit();
                exit;
            } else {
                document.getElementById('GrupoMensaje').classList.add("formMensaje-activo");
            }
        case 'FormInsertContacto':
            if (campos.Contacto) {
                formulario.submit();
                exit;
            } else {
                document.getElementById('GrupoMensaje').classList.add("formMensaje-activo");
            }
        case 'FormInsertTipoContacto':
            if (campos.Nombre) {

                formulario.submit();
                exit;
            } else {
                document.getElementById('GrupoMensaje').classList.add("formMensaje-activo");
            }
        case 'FormInsertDetalleDomicilio':
            if (campos.DetalleDomicilio) {

                formulario.submit();
                exit;
            } else {
                document.getElementById('GrupoMensaje').classList.add("formMensaje-activo");
            }
        case 'FormInsertAnioDesarrollo':
            if (campos.DetalleAnio) {

                formulario.submit();
                exit;
            } else {
                document.getElementById('GrupoMensaje').classList.add("formMensaje-activo");
            }
        case 'FormInsertPeriodoDesarrollo':
            if (campos.DetallePeriodo) {

                formulario.submit();
                exit;
            } else {
                document.getElementById('GrupoMensaje').classList.add("formMensaje-activo");
            }
        case 'FormInsertBuscarCalendarizacion':
            if (campos.cboCarrera) {

                formulario.submit();
                exit;
            } else {
                document.getElementById('GrupoMensaje').classList.add("formMensaje-activo");
            }
        case 'FormInsertDetalleCalendarizacion':
            if (campos.NumClase) {

                formulario.submit();
                exit;
            } else {
                document.getElementById('GrupoMensaje').classList.add("formMensaje-activo");
            }

        case 'FormInsertAsignar':
            if (campos.cboCarrera) {

                formulario.submit();
                exit;
            } else {
                document.getElementById('GrupoMensaje').classList.add("formMensaje-activo");
            }
        case 'FormInsertAsignarMateria':
            if (campos.cboMateria && campos.cboPeriodoDesarrollo && campos.cboAnioDesarrollo) {

                formulario.submit();
                exit;
            } else {
                document.getElementById('GrupoMensaje').classList.add("formMensaje-activo");
            }
        case 'FormInsertAsignarDocente':
            if (campos.cboDocente) {

                formulario.submit();
                exit;
            } else {
                document.getElementById('GrupoMensaje').classList.add("formMensaje-activo");
            }
        case 'FormInsertAsignarCarrera':
            if (campos.cboCarrera && campos.cboCicloLectivo) {

                formulario.submit();
                exit;
            } else {
                document.getElementById('GrupoMensaje').classList.add("formMensaje-activo");
            }
        case 'FormInsertHorario':
            if (campos.cboDia && campos.HoraInicio && campos.HoraFin && campos.Numero) {

                formulario.submit();
                exit;
            } else {
                document.getElementById('GrupoMensaje').classList.add("formMensaje-activo");
            }
        case 'FormInsertModulo':
            if (campos.Modulo) {

                formulario.submit();
                exit;
            } else {
                document.getElementById('GrupoMensaje').classList.add("formMensaje-activo");
            }
        case 'FormInsertTipoContacto':
            if (campos.TipoContacto) {

                document.getElementById('GrupoMensaje').classList.remove("formMensaje-activo");

                formulario.submit();
                exit;
            } else {
                document.getElementById('GrupoMensaje').classList.add("formMensaje-activo");
            }
        case 'FormInsertClase':
            if (campos.cboCarrera && campos.cboMateria) {


                formulario.submit();
                document.getElementById('GrupoMensaje').classList.remove("formMensaje-activo");

                exit;
            } else {
                document.getElementById('GrupoMensaje').classList.add("formMensaje-activo");
            }
        case 'FormInsertAsistencia':
            if (campos.cboCarrera && campos.cboMateria) {

                formulario.submit();
                exit;
            } else {
                document.getElementById('GrupoMensaje').classList.add("formMensaje-activo");
            }
        case 'FormInsertBusquedaApellidoAlumno':
            if (campos.Apellido) {

                formulario.submit();
                exit;
            } else {
                document.getElementById('GrupoMensaje').classList.add("formMensaje-activo");
            }
        case 'FormInsertLibroTemas':
            if (campos.observaciones && campos.temaDia) {

                formulario.submit();
                exit;
            } else {
                document.getElementById('GrupoMensaje').classList.add("formMensaje-activo");
            }

    }

})