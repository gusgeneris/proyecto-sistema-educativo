<?php
require_once "class/Usuario.php";
require_once "class/Persona.php";
require_once "configs.php";

$usuario=$_POST['txtUsuario'];
$contrasenia=$_POST['txtContrasenia'];


$user=Usuario::login($usuario,$contrasenia);

if($user->estaLogeado()==1){
    echo "Bienvenido  {$usuario}";
    highlight_string(var_export($user,true));
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