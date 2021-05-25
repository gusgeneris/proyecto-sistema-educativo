<?php
require_once "class/Usuario.php";
require_once "configs.php";

session_start();

if(isset($_SESSION['usuario'])){
    $usuario=$_SESSION['usuario'];
}
else{header("Location:test_login.php?error=".INCORRECT_SESSION_CODE);
exit;}
$_SESSION['usuario']=$usuario;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleInsert.css">
    <title>Document</title>
</head>
<body class="body-inicio">
<header class="">
    <nav>
        <a><img class="logob" src="image/logo.png" href="inicio.php"></a>
    
        <a class="frasecabeza" href="inicio.php">S.I.G.E</a>

    </nav>


</header>

<h1 class="titulo">Hola <?php echo $usuario;?></h1>

<div><a href="test_usuario_obtener_todos.php" class="boton-list-user">Administrar Usuarios</a></div>

<div><a href="listado_alumnos.php" class="boton-list-user">Administrar Alumnos</a></div>

<div><a href="listado_docente.php" class="boton-list-user">Administrar Docente</a></div>

<a href="cerrar_sesion.php" class="boton-list-user">Cerrar Sesion</a>


    
</body>
</html>