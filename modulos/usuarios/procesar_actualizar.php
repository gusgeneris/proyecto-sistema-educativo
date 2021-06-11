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
$nombreUser = $_POST['UsuarioNom'];
$personaNombre = $_POST['PersonaNom'];
$personaApellido = $_POST['Apellido'];
$personaDni = $_POST['Dni'];
$personaFechaNac = $_POST['FechaNac'];
$personaNacionalidad= $_POST['Nacionalidad'];
$idPersona= $_POST['IdPersona'];
$personaSexo= $_POST['Sexo'];
$usuarioPerfil= $_POST['Perfil'];

$user=new Usuario();
$user->setIdUsuario($idUsuario);
$user->setNombreUsuario($nombreUser);
$user->setNombre($personaNombre);
$user->setApellido($personaApellido);
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