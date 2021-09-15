<?php
require_once "../../class/Persona.php";
require_once "../../class/Alumno.php";
require_once "../../class/Mysql.php";
require_once "../../configs.php";

$cancelar= $_POST['Cancelar'];

if($cancelar==true){
    header("Location:listado.php");
    exit;
}

$idAlumno=$_POST['IdAlumno'];
$personaNombre = $_POST['PersonaNom'];
$personaApellido = $_POST['Apellido'];
$personaDni = $_POST['Dni'];
$personaFechaNac = $_POST['FechaNac'];
$personaNacionalidad= $_POST['Nacionalidad'];
$idPersona= $_POST['IdPersona'];
$personaSexo= $_POST['cboSexo'];
$numLegajo= $_POST['NumLegajo'];


if ($personaDni == ''){
    $personaDni = 'NULL';
}
if ($personaNacionalidad == ''){
    $personaNacionalidad = 'NULL';
}

if ($personaFechaNac == ''){
    $personaFechaNac = null;
}

#COMPRUEBA LAS CANTIDADES MINIMAS DE DIGITOS QUE DEBE CONTENER
if (strlen($personaNombre) < 3 ){

    header("Location:listado.php?mj=".ERROR_LONGITUD_NAME_CODE);
    exit;
}

if (ctype_alpha($personaNombre) == false){
    header("Location:listado.php?mj=".ERROR_NAME_NO_PERMITE_NUMEROS_CODE);
    exit;
}


if (strlen($personaApellido) < 3){
    
    header("Location:listado.php?mj=".ERROR_LONGITUD_LAST_NAME_CODE);
    
}

if (ctype_alpha($personaApellido) == false){
    header("Location:listado.php?mj=".ERROR_LAST_NAME_NO_PERMITE_NUMEROS_CODE);
    exit;
}

#TODO: PERMITIR QUE ACEPTE ESPACIOS

if((!preg_match("/^[a-zA-Z´]+$/",$personaApellido))){
    header("Location:listado?mj=".ERROR_LONGITUD_LAST_NAME_CODE );
    exit;
} 

if((!preg_match("/^\d*$/",$personaDni))){
    header("Location:listado?mj=".ERROR_DNI_NUMBER_CODE );
    exit;
} 

if((!preg_match("/^\d*$/",$numLegajo))){
    header("Location:listado?mj=".ERROR_DNI_NUMBER_CODE );
    exit;
} 





#COMPRUEBA QUE EL CAMPO SEXO NO ESTE VACIO
if ($personaSexo=='NULL'){
    header("Location:listado?mj=".ERROR_SEXO_INCORRECT_CODE);
    exit;
}


$alumno=new Alumno();
$alumno->setIdAlumno($idAlumno);
$alumno->setNombre($personaNombre);
$alumno->setApellido($personaApellido);
$alumno->setDni($personaDni);
$alumno->setFechaNacimiento($personaFechaNac);
$alumno->setNacionalidad($personaNacionalidad);
$alumno->setIdPersona($idPersona);
$alumno->setIdSexo($personaSexo);
$alumno->setNumeroLegajo($numLegajo);

$alumno->actualizarAlumno();

if ($alumno){
    header("Location:listado.php?mj=".CORRECT_UPDATE_CODE);
}

?>