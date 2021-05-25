<?php
require_once "class/Docente.php";
require_once "class/Persona.php";
require_once "class/Sexo.php";
require_once "configs.php";

session_start();

if(isset($_SESSION['usuario'])){
    $usuario=$_SESSION['usuario'];
}
else{header("Location:test_login.php?error=".INCORRECT_SESSION_CODE);
exit;}

$lista = Docente::listadoDocente();


$mensaje='';
    
if(isset($_GET['mj'])){
    $mj=$_GET['mj'];
    if ($mj==CORRECT_INSERT_CODE){
        $mensaje=CORRECT_INSERT_MENSAJE;?>
        <div class="mensajes"><?php echo $mensaje;?></div><?php
    }else if($mj==CORRECT_UPDATE_CODE){
        $mensaje=CORRECT_UPDATE_MENSAJE;?>
        <div class="mensajes"><?php echo $mensaje;?></div><?php
    }
};


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleInsert.css" class="">
    <style class=""></style>
    <title>Listado</title>
</head>
<header class="">
    <nav>
        <a><img class="logob" src="image/logo.png" href="inicio.php"></a>
    
        <a class="frasecabeza" href="inicio.php">S.I.G.E</a>
    </nav>
</header>
<body class="body-listuser">
    <br>
    <br>
    <h1 class="titulo">Lista de Docentes</h1>
        <div class="botonesnav">
                <a href="insert_docente.php" class="insert">Insertar Nuevo Docente</a>
        </div>
    <table class="tabla" method="GET">
        <tr >
            <th> ID Docente</th>
            <th> ID Persona</th>
            <th> Nombre</th>
            <th> Apellido</th>
            <th> Fecha Nacimiento</th>
            <th> Nacionalidad</th>
            <th> Numero Matricula</th>
            <th> Sexo</th>

            <th> Acciones</th>

        </tr>
        <?php foreach ($lista as $docente ):?> 
            <tr >
                <td >
                    <?php echo $docente->getIdDocente(); ?>
                </td>
                <td>
                    <?php echo $docente->getIdPersona(); ?>
                </td>
                <td>
                    <?php echo $docente->getNombre(); ?>
                </td>
                <td>
                    <?php echo $docente->getApellido(); ?>
                </td>
                <td>
                    <?php echo $docente->getFechaNacimiento(); ?>
                </td>
                <td>
                    <?php echo $docente->getNacionalidad(); ?>
                </td>
                <td>
                    <?php echo $docente->getNumMatricula(); ?>
                </td>
                <td>
                    <?php echo $docente->getIdSexo(); ?>
                </td>
                <td>
                    <a href="borrar_usuario.php" class="">borrar</a>
                    <a href="modificar_docente.php?id= <?php echo $docente->getIdDocente(); ?>" class="">modificar</a>
                </td>
            </tr>
        <?php endforeach ?>
        <div class="cerrar_sesion">
                <a href="cerrar_sesion.php" class="">Cerrar Sesion</a>
        </div>
    
    </table>



</body>
</html>