<?php
require_once "class/Persona.php";
require_once "class/Usuario.php";
require_once "class/Mysql.php";
require_once "configs.php";


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

highlight_string(var_export($user,true));

if ($user){
    header("Location:test_usuario_obtener_todos.php?mj=".CORRECT_INSERT_CODE);
}

?>