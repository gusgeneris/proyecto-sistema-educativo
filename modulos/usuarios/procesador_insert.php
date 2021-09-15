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

$nombreUser = $_POST['Nombre'];
$contrasenia = $_POST['Contrasenia'];
$personaNombre = $_POST['Nombre'];
$personaApellido = $_POST['Apellido'];
$personaDni = $_POST['Dni'];
$personaFechaNac = $_POST['FechaNacimiento'];
$personaNacionalidad= $_POST['Nacionalidad'];
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

if((!preg_match("/^.{4,12}$/",$contrasenia))){
    header("Location:listado?mj=".ERROR_LONGITUD_LAST_NAME_CODE );
    exit;
} 



#COMPRUEBA QUE EL CAMPO SEXO NO ESTE VACIO
if ($personaSexo=='NULL'){
    header("Location:listado?mj=".ERROR_SEXO_INCORRECT_CODE);
    exit;
} 


$user=new Usuario();
$user->setNombreUsuario($nombreUser);
$user->setContraseña($contrasenia);
$user->setNombre($personaNombre);
$user->setApellido($personaApellido);
$user->setDni($personaDni);
$user->setFechaNacimiento($personaFechaNac);
$user->setNacionalidad($personaNacionalidad);
$user->setIdSexo($personaSexo);
$user->setIdPerfil($usuarioPerfil);
$user->setEstado('1');
$user->perfil=$usuarioPerfil;

$user->insertUser();

if ($user){
    header("Location:listado.php?mj=".CORRECT_INSERT_CODE);
}

?>