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

$nombreUser = $_POST['NombreUser'];
$contrasenia = $_POST['Contrasenia'];
$personaNombre = $_POST['NombrePers'];
$personaApellido = $_POST['Apellido'];
$personaDni = $_POST['Dni'];
$personaFechaNac = $_POST['FechaNac'];
$personaNacionalidad= $_POST['Nacionalidad'];
$personaSexo= $_POST['Sexo'];
$usuarioPerfil= $_POST['Perfil'];


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
$user->set_estaLogeado('1');
$user->setPerfil('1');

$user->insertUser();

if ($user){
    header("Location:listado.php?mj=".CORRECT_INSERT_CODE);
}

?>