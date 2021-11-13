<?php
require_once "../../class/Persona.php";
require_once "../../class/Docente.php";
require_once "../../class/Usuario.php";
require_once "../../class/Mysql.php";
require_once "../../configs.php";

$cancelar= $_POST['Cancelar'];

if($cancelar==true){
    header("Location:listado.php");
    exit;
}

$personaNombre = $_POST['Nombre'];
$personaApellido = $_POST['Apellido'];
$personaDni = $_POST['Dni'];
$personaFechaNac = $_POST['Fecha'];
$personaNacionalidad= $_POST['Nacionalidad'];
$docenteNumMatricula= $_POST['NumeroMatricula'];
$personaSexo= $_POST['cboSexo'];

$nombreUser = $_POST['NombreUsuario'];
$contrasenia = $_POST['Contrasenia'];
$perfilUsuario = $_POST['PerfilUsuario'];



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

if((!preg_match("/^[a-zA-Z_ ]*$/",$personaApellido))){
    header("Location:listado?mj=".ERROR_LONGITUD_LAST_NAME_CODE );
    exit;
} 



#COMPRUEBA QUE EL CAMPO SEXO NO ESTE VACIO
if ($personaSexo=='NULL'){
    header("Location:listado?mj=".ERROR_SEXO_INCORRECT_CODE);
    exit;
}


$docente=new Docente();
$docente->setNombre($personaNombre);
$docente->setApellido($personaApellido);
$docente->setDni($personaDni);
$docente->setFechaNacimiento($personaFechaNac);
$docente->setNacionalidad($personaNacionalidad);
$docente->setNumMatricula($docenteNumMatricula);
$docente->setIdSexo($personaSexo);

$docente->insertDocente();

$idPersona=$docente->getIdPersona();

$usuario=new Usuario();
$usuario->setNombreUsuario($nombreUser);
$usuario->setContrasenia($contrasenia);
$usuario->setIdPerfil($perfilUsuario);

$usuario->insertUserDocente($idPersona);

if ($docente && $usuario){
    header("Location:listado.php?mj=".CORRECT_INSERT_CODE);
} 
?>