<?php
require_once "class/Usuario.php";
require_once "class/Persona.php";
require_once "configs.php";

$usuario=$_POST['txtUsuario'];
$contrasenia=$_POST['txtContrasenia'];


$user=Usuario::login($usuario,$contrasenia);

if($user->estaLogeado()==1){
    session_start();
    $_SESSION['usuario']=$user;
    header("Location:inicio.php");
}
else if($usuario==null || $contrasenia==null){
    header("Location:test_login.php?error=".ERROR_LOGIN_CODE_NULL_DATA);
}
else if($user->estaLogeado()==2){
    
    header("Location:test_login.php?error=".ERROR_LOGIN_CODE_INACTIVE_USER);
}
else{
    header("Location:test_login.php?error=".ERROR_LOGIN_CODE);
}






?>