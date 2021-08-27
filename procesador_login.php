<?php
require_once "class/Usuario.php";
require_once "class/Persona.php";
require_once "configs.php";

$usuario=$_POST['txtUsuario'];
$contrasenia=$_POST['txtContrasenia'];


$user=Usuario::login($usuario,$contrasenia);
/*highlight_string(var_export($user,true));
exit;*/

if($user->getEstado()==1){
    session_start();
    $_SESSION['usuario']=$user;
    header("Location:inicio.php");
}
else if($usuario==null || $contrasenia==null){
    header("Location:login.php?error=".ERROR_LOGIN_CODE_NULL_DATA);
}
else if($user->getEstado()==2){
    
    header("Location:login.php?error=".ERROR_LOGIN_CODE_INACTIVE_USER);
}
else{
    header("Location:login.php?error=".ERROR_LOGIN_CODE);
}

?>
