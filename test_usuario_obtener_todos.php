<?php
require_once "class/Usuario.php";
require_once "class/Persona.php";
require_once "configs.php";

$lista = Usuario::obtenerTodos();

    
$mensaje='';
    
if(isset($_GET['mj'])){
    $mj=$_GET['mj'];
    if ($mj==CORRECT_INSERT_CODE){
        $mensaje=CORRECT_INSERT_MENSAJE;?>
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
<body>
    <a href="insert_usuario" class="">Insertar usuario</a>
    <br>
    <br>
    <table border="5px">
        <tr >
            <th> ID Usuario</th>
            <th> ID Persona</th>
            <th> Nombre</th>
            <th> Apellido</th>
            <th> Fecha Nacimiento</th>
            <th> Nombre Usuario</th>
            <th> Sexo</th>
        </tr>
        <?php foreach ($lista as $usuario ):?> 
            <tr >
                <td >
                    <?php echo $usuario->getIdUsuario(); ?>
                </td>
                <td>
                    <?php echo $usuario->getIdPersona(); ?>
                </td>
                <td>
                    <?php echo $usuario->getNombre(); ?>
                </td>
                <td>
                    <?php echo $usuario->getApellido(); ?>
                </td>
                <td>
                    <?php echo $usuario->getFechaNacimiento(); ?>
                </td>
                <td>
                    <?php echo $usuario->getNombreUsuario(); ?>
                </td>
                <td>
                    <?php echo $usuario->getIdSexo(); ?>
                </td>
            
            </tr>
        <?php endforeach ?>
    
    
    </table>



</body>
</html>