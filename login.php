<?php
    require_once "class/Usuario.php";
    require_once "configs.php";
    require_once "mensaje.php";

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="/proyecto-modulos/style/login.css">
        <link rel="stylesheet" href="/proyecto-modulos/style/mensaje.css">
        <link rel="icon" type="image/jpg" href="image/logo.png"><title>Login</title>
        <title>Login</title>
    </head>

    <body class="body">
        
        <div class="formulario-inicio">
            <form action="procesador_login.php" method="POST" class="login">
                    <div class="logo"> 
                        <img src="image/logoo_frase.png" alt="" class="logoLogin">
                    </div>
                    <div class="campos-login">
                        <input class="inputLogin" type="text" name="txtUsuario" placeholder="Usuario" >
                    </div>
                    <div class="campos-login">
                        <input class="inputLogin" type="password" name="txtContrasenia" placeholder="Contraseña"> 
                    </div>
                    <div class="campos-login">
                        <input class="inputLogin" type="submit" name="guardar" value="Iniciar Sesion">
                    </div>
            </form> 
        </div>
    </body>
</html>


