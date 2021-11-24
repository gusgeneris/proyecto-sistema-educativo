const formulario = document.getElementById('formModificar');

const inputs = document.querySelectorAll('#formModificar input');

const selects = document.querySelectorAll('#formModificar select');

const expresiones = {
    usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
    nombre: /^[a-zA-ZÀ-ÿ\s ]{3,40}$/, // Letras y espacios, pueden llevar acentos.
    nombreCarrera: /^[a-zA-Z0-9_ ]*$/,
    apellido: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
    contrasenia: /^.{4,12}$/, // 4 a 12 digitos.
    correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
    dni: /^\d{7,14}$/, // 7 a 14 numeros.
    numeros: /^\d{7,14}$/, // 7 a 14 numeros.
    nombreMateria: /^[a-zA-Z0-9_ ]{3,}$/,
    fecha: /^\d{4}([\-/.])(0?[1-9]|1[1-2])\1(3[01]|[12][0-9]|0?[1-9])$/,
    anio: /^\d{4}$/,
    anios: /^\d{1}$/,
    nulo: /^\0$/,
    especialidad: /^[a-zA-Z_ ]*$/,
    barrio: /^[a-zA-Z0-9_ ]*$/,
    contacto: /^[a-zA-Z0-9_.+-@]{3,40}$/,
    detalleDomicilio: /^[a-zA-Z0-9_ ]*$/,
    cboSelect: /^[1-9]{1,3}$/,
    numClase: /^\d{1,100}$/,
    localidad: /^[a-zA-Z0-9_ ]*$/,
    hora: /^([01]?[0-9]|2[0-3]):[0-5][0-9]$/,
    numero: /^\d{1}$/,
    nombreUsuario: /^[a-zA-Z0-9_.+-@]{3,40}$/,
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
    NombreMateria: false,
    Perfil: false,
    Anios: false,
    Especialidad: false,
    Barrio: false,
    Anios: false,
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
    DetalleAnio: false,
    DetallePeriodo: false,
    NumClase: false,
    NombreCarrera: false,
    fecha: false,
    cboPeriodoDesarrollo: false,
    cboAnioDesarrollo: false,
    cboDia: false,
    HoraInicio: false,
    HoraFin: false,
    Numero: false,
    Modulo: false,
    cboTipoClase: false
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
        case "Anios":
            validarCampo(expresiones.anios, e.target, 'Anios')
            break;
        case "NumeroMatricula":
            validarCampo(expresiones.numeros, e.target, 'NumeroMatricula')
            break;
        case "NombreMateria":
            validarCampo(expresiones.nombreMateria, e.target, 'NombreMateria')
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
        case "NombreCarrera":
            validarCampo(expresiones.nombreCarrera, e.target, 'NombreCarrera')
            break;
        case "CicloLectivo":
            validarCampo(expresiones.anio, e.target, 'CicloLectivo')
            break;
        case "Perfil":
            validarCampo(expresiones.nombre, e.target, 'Perfil')
            break;
        case "Especialidad":
            validarCampo(expresiones.especialidad, e.target, 'Especialidad')
            break;
        case "DetalleDomicilio":
            validarCampo(expresiones.detalleDomicilio, e.target, 'DetalleDomicilio')
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
        case "TipoContacto":
            validarCampo(expresiones.nombre, e.target, 'TipoContacto')
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
        case "NumeroLegajo":
            validarCampo(expresiones.numeros, e.target, 'NumeroLegajo')
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
        case "Modulo":
            validarCampo(expresiones.nombre, e.target, 'Modulo')
            break;
        case "cboTipoClase":
            validarCampo(expresiones.cboSelect, e.target, 'cboTipoClase')
            break;

    }

}

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
    input.focus();
    input.addEventListener('keyup', (validarFormulario))
    input.addEventListener('blur', (validarFormulario))


    input.addEventListener('onfocus', (validarFormulario))
})

selects.forEach((select) => {
    select.addEventListener('change', (validarFormulario));
})


formulario.addEventListener('submit', (e) => {
    e.preventDefault();

    switch (document.getElementById('Guardar').value) {
        case 'FormInsertAlumnos':

            if (campos.Nombre && campos.Apellido && campos.Dni && campos.Nacionalidad && campos.NumeroLegajo) {

                document.getElementById('GrupoMensaje').classList.remove("formMensaje-activo");

                formulario.submit();
                exit;
            } else {
                document.getElementById('GrupoMensaje').classList.add("formMensaje-activo");
            }
        case 'FormInsertDocente':
            if (campos.Nombre && campos.Apellido && campos.Dni && campos.Nacionalidad && campos.NumeroMatricula) {

                document.getElementById('GrupoMensaje').classList.remove("formMensaje-activo");

                formulario.submit();
                exit;
            } else {
                document.getElementById('GrupoMensaje').classList.add("formMensaje-activo");
            }
        case 'FormInsertUsuario':
            if (campos.Nombre && campos.Apellido && campos.Dni && campos.Nacionalidad && campos.Contrasenia && campos.NombreUsuario) {

                document.getElementById('GrupoMensaje').classList.remove("formMensaje-activo");

                formulario.submit();
                exit;
            } else {

                document.getElementById('GrupoMensaje').classList.add("formMensaje-activo");
            }
        case 'FormInsertCicloLectivo':
            if (campos.CicloLectivo) {

                document.getElementById('GrupoMensaje').classList.remove("formMensaje-activo");

                formulario.submit();
                exit;
            } else {
                document.getElementById('GrupoMensaje').classList.add("formMensaje-activo");
            }
        case 'FormInsertPerfil':
            if (campos.Nombre) {

                document.getElementById('GrupoMensaje').classList.remove("formMensaje-activo");

                formulario.submit();
                exit;
            } else {
                document.getElementById('GrupoMensaje').classList.add("formMensaje-activo");
            }
        case 'FormInsertCarrera':
            if (campos.NombreCarrera && campos.Anios) {

                document.getElementById('GrupoMensaje').classList.remove("formMensaje-activo");

                formulario.submit();
                exit;
            } else {
                document.getElementById('GrupoMensaje').classList.add("formMensaje-activo");
            }
        case 'FormInsertEspecialidad':
            if (campos.Especialidad) {

                document.getElementById('GrupoMensaje').classList.remove("formMensaje-activo");

                formulario.submit();
                exit;
            } else {
                document.getElementById('GrupoMensaje').classList.add("formMensaje-activo");
            }
        case 'FormInsertBarrio':
            if (campos.Barrio) {

                document.getElementById('GrupoMensaje').classList.remove("formMensaje-activo");

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

                document.getElementById('GrupoMensaje').classList.remove("formMensaje-activo");

                formulario.submit();
                exit;
            } else {
                document.getElementById('GrupoMensaje').classList.add("formMensaje-activo");
            }
        case 'FormInsertLocalidad':
            if (campos.Localidad) {

                document.getElementById('GrupoMensaje').classList.remove("formMensaje-activo");

                formulario.submit();
                exit;
            } else {
                document.getElementById('GrupoMensaje').classList.add("formMensaje-activo");
            }
        case 'FormInsertContacto':
            if (campos.Contacto) {

                document.getElementById('GrupoMensaje').classList.remove("formMensaje-activo");

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
        case 'FormInsertDetalleDomicilio':
            if (campos.DetalleDomicilio) {

                document.getElementById('GrupoMensaje').classList.remove("formMensaje-activo");

                formulario.submit();
                exit;
            } else {
                document.getElementById('GrupoMensaje').classList.add("formMensaje-activo");
            }
        case 'FormInsertAnioDesarrollo':
            if (campos.DetalleAnio) {

                document.getElementById('GrupoMensaje').classList.remove("formMensaje-activo");

                formulario.submit();
                exit;
            } else {
                document.getElementById('GrupoMensaje').classList.add("formMensaje-activo");
            }
        case 'FormInsertPeriodoDesarrollo':
            if (campos.DetallePeriodo) {

                document.getElementById('GrupoMensaje').classList.remove("formMensaje-activo");

                formulario.submit();
                exit;
            } else {
                document.getElementById('GrupoMensaje').classList.add("formMensaje-activo");
            }
        case 'FormInsertDetalleCalendarizacion':
            if (campos.NumClase) {

                document.getElementById('GrupoMensaje').classList.remove("formMensaje-activo");

                formulario.submit();
                exit;
            } else {
                document.getElementById('GrupoMensaje').classList.add("formMensaje-activo");
            }
        case 'FormInsertAsignar':
            if (campos.cboCarrera) {

                document.getElementById('GrupoMensaje').classList.remove("formMensaje-activo");

                formulario.submit();
                exit;
            } else {
                document.getElementById('GrupoMensaje').classList.add("formMensaje-activo");
            }
        case 'FormInsertAsignarMateria':
            if (campos.cboMateria && campos.cboPeriodoDesarrollo && campos.cboAnioDesarrollo) {

                document.getElementById('GrupoMensaje').classList.remove("formMensaje-activo");

                formulario.submit();
                exit;
            } else {
                document.getElementById('GrupoMensaje').classList.add("formMensaje-activo");
            }
        case 'FormInsertAsignarDocente':
            if (campos.cboDocente) {

                document.getElementById('GrupoMensaje').classList.remove("formMensaje-activo");

                formulario.submit();
                exit;
            } else {
                document.getElementById('GrupoMensaje').classList.add("formMensaje-activo");
            }
        case 'FormInsertAsignarCarrera':
            if (campos.cboCarrera && campos.cboCicloLectivo) {

                document.getElementById('GrupoMensaje').classList.remove("formMensaje-activo");

                formulario.submit();
                exit;
            } else {
                document.getElementById('GrupoMensaje').classList.add("formMensaje-activo");
            }
        case 'FormInsertHorario':
            if (campos.cboDia && campos.HoraInicio && campos.HoraFin && campos.Numero) {

                document.getElementById('GrupoMensaje').classList.remove("formMensaje-activo");

                formulario.submit();
                exit;
            } else {
                document.getElementById('GrupoMensaje').classList.add("formMensaje-activo");
            }
        case 'FormInsertAsignar':
            if (campos.cboCarrera) {

                document.getElementById('GrupoMensaje').classList.remove("formMensaje-activo");

                formulario.submit();
                exit;
            } else {
                document.getElementById('GrupoMensaje').classList.add("formMensaje-activo");
            }
        case 'FormInsertAsignarMateria':
            if (campos.cboMateria && campos.cboPeriodoDesarrollo && campos.cboAnioDesarrollo) {

                document.getElementById('GrupoMensaje').classList.remove("formMensaje-activo");

                formulario.submit();
                exit;
            } else {
                document.getElementById('GrupoMensaje').classList.add("formMensaje-activo");
            }
        case 'FormInsertAsignarDocente':
            if (campos.cboDocente) {

                document.getElementById('GrupoMensaje').classList.remove("formMensaje-activo");

                formulario.submit();
                exit;
            } else {
                document.getElementById('GrupoMensaje').classList.add("formMensaje-activo");
            }
        case 'FormInsertAsignarCarrera':
            if (campos.cboCarrera && campos.cboCicloLectivo) {

                document.getElementById('GrupoMensaje').classList.remove("formMensaje-activo");

                formulario.submit();
                exit;
            } else {
                document.getElementById('GrupoMensaje').classList.add("formMensaje-activo");
            }
        case 'FormInsertHorario':
            if (campos.cboDia && campos.HoraInicio && campos.HoraFin && campos.Numero) {

                document.getElementById('GrupoMensaje').classList.remove("formMensaje-activo");

                formulario.submit();
                exit;
            } else {
                document.getElementById('GrupoMensaje').classList.add("formMensaje-activo");
            }
        case 'FormInsertModulo':
            if (campos.Modulo) {

                document.getElementById('GrupoMensaje').classList.remove("formMensaje-activo");

                formulario.submit();
                exit;
            } else {
                document.getElementById('GrupoMensaje').classList.add("formMensaje-activo");
            }

        case 'FormInsertClase':
            if (campos.Fecha) {

                document.getElementById('GrupoMensaje').classList.remove("formMensaje-activo");

                formulario.submit();
                exit;

            } else {
                document.getElementById('GrupoMensaje').classList.add("formMensaje-activo");
            }
        case 'FormInsertPerfil':
            if (campos.Perfil) {

                document.getElementById('GrupoMensaje').classList.remove("formMensaje-activo");

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

    }

})