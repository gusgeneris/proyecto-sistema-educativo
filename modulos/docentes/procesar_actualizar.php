<?php
require_once "../../class/Persona.php";
require_once "../../class/Docente.php";
require_once "../../class/Mysql.php";
require_once "../../configs.php";

$cancelar= $_POST['Cancelar'];

if($cancelar==true){
    header("Location:listado.php");
    exit;
}

$idDocente=$_POST['idDocente'];
$idPersona= $_POST['IdPersona'];
$personaNombre = $_POST['Nombre'];
$personaApellido = $_POST['Apellido'];
$personaFechaNac = $_POST['FechaNac'];
$personaDni = $_POST['Dni'];
$personaNacionalidad= $_POST['Nacionalidad'];
$numMatricula= $_POST['NumMatricula'];
$personaSexo= $_POST['cboSexo'];

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




#COMPRUEBA QUE EL CAMPO SEXO NO ESTE VACIO
if ($personaSexo=='NULL'){
    header("Location:listado?mj=".ERROR_SEXO_INCORRECT_CODE);
    exit;
}

$docente=new Docente();
$docente->setIdDocente($idDocente);
$docente->setNombre($personaNombre);
$docente->setApellido($personaApellido);
$docente->setDni($personaDni);
$docente->setFechaNacimiento($personaFechaNac);
$docente->setNacionalidad($personaNacionalidad);
$docente->setIdPersona($idPersona);
$docente->setIdSexo($personaSexo);
$docente->setNumMatricula($numMatricula);

$docente->actualizarDocente();

if ($docente){
    header("Location:listado.php?mj=".CORRECT_UPDATE_CODE);
}

?>