<?php
require_once "class/Usuario.php";
require_once "class/Persona.php";

/*$user= new Usuario();

$user->setNombreUsuario("gusgeneris");
$user->setContraseña("1234");

highlight_string(var_export($user,true)); 
*/

#$eliminar= Usuario::eliminarPorId(2);

$lista = Usuario::obtenerTodos();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style.css" class="">
    <style class=""></style>
    <title>Document</title>
</head>
<body>
    <table border="5px">
        <tr >
            <th> ID Usuario</th>
            <th> ID Persona</th>
            <th> Nombre</th>
            <th> Apellido</th>
            <th> Fecha Nacimiento</th>
            <th> Nombre Usuario</th>
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
            
            </tr>
        <?php endforeach ?>
    
    
    </table>



</body>
</html>