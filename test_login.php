<?php
require_once "class/Usuario.php";
require_once "configs.php";
$mensaje='';

if(isset($_GET['error'])){
    $error=$_GET['error'];
    if ($error==ERROR_LOGIN_CODE){
        $mensaje=ERROR_LOGIN_MENSAJE;?>
        <div class="mensaje"><?php echo $mensaje;?></div><?php
    }
    else if ($error==ERROR_LOGIN_CODE_INACTIVE_USER){
        $mensaje=ERROR_LOGIN_MENSAJE_INACTIVE_USER;?>
        <div class="mensaje"><?php echo $mensaje;?></div><?php

    }
    else if ($error==ERROR_LOGIN_CODE_NULL_DATA){
        $mensaje=ERROR_LOGIN_MENSAJE_NULL_DATA;?>
        <div class="mensaje"><?php echo $mensaje;?></div><?php
        
    }
    else if ($error==INCORRECT_SESSION_CODE){
        $mensaje=INCORRECT_SESSION_MENSAJE;?>
        <div class="mensaje"><?php echo $mensaje;?></div><?php
        
    }
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body class="body">
    
    <div class="formulario-inicio">
        <form action="procesador_login.php" method="POST" class="login"> 
            <h1 class="titulo-login">Ingresar</h1>
                <div class="campos-login">
                    <input type="text" name="txtUsuario" placeholder="Usuario" >
                </div>
                <div class="campos-login">
                    <input type="text" name="txtContrasenia" placeholder="Contraseña"> 
                </div>
                <div class="campos-login">
                    <input type="submit" name="guardar" value="Iniciar Sesion">
                </div>
        </form> 
    </div>
</body>
</html>


