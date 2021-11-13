<?php
require_once "../../class/Persona.php";
require_once "../../class/Usuario.php";
require_once "../../class/Mysql.php";
require_once "../../configs.php";

$cancelar= $_POST['Cancelar'];

if($cancelar==true){
    header("Location:listado.php");
    exit;
}

$idUsuario=$_POST['idUsuario'];
$nombreUser = $_POST['NombreUsuario'];
$contrasenia = $_POST['Contrasenia'];
$personaNombre = $_POST['Nombre'];
$personaApellido = $_POST['Apellido'];
$personaDni = $_POST['Dni'];
$personaFechaNac = $_POST['FechaNacimiento'];
$personaNacionalidad= $_POST['Nacionalidad'];
$idPersona= $_POST['IdPersona'];
$personaSexo= $_POST['cboSexo'];
$usuarioPerfil= $_POST['cboPerfil'];

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

$user=new Usuario();
$user->setIdUsuario($idUsuario);
$user->setNombreUsuario($nombreUser);
$user->setNombre($personaNombre);
$user->setApellido($personaApellido);
$user->setContrasenia($contrasenia);
$user->setDni($personaDni);
$user->setFechaNacimiento($personaFechaNac);
$user->setNacionalidad($personaNacionalidad);
$user->setIdPersona($idPersona);
$user->setIdSexo($personaSexo);
$user->setIdPerfil($usuarioPerfil);

$user->actualizarUsuario();

if ($user){
    header("Location:listado.php?mj=".CORRECT_UPDATE_CODE);
}

?>