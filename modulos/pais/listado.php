<?php
require_once "../../class/Pais.php";
require_once "../../configs.php";

#$idPersona=$_GET['idPersona'];

$lista = Pais::listado();

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
    <link rel="stylesheet" href="/proyecto-modulos/style/styleInsert.css" class="">
    <link rel="stylesheet" href="/proyecto-modulos/style/menu.css" class="">
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Agregar domicilio</title>
</head>

<?php require_once "../../menu.php";?>

<body class="body-listuser">
    <br>
    <br>
    <h1 class="titulo">Lista de Paises</h1>
    <br>
    <br>

    <a href="insert.php">Agregar Pais</a>
 
    <table class="tabla" method="GET">
        <tr >
            <th> ID Pais </th>
            <th> Nombre</th>

            <th> Acciones</th>

        </tr>
        <?php foreach ($lista as $pais ):?> 
            <tr >
                <td >
                    <?php echo $pais->getIdPais(); ?>
                </td>
                <td>
                    <?php echo $pais->getNombre(); ?>
                </td>

                <td>
                    <a href="eliminar.php?idPais=<?php echo $pais->getIdPais(); ?>" class="">Borrar</a> | 
                    <a href="modificar.php?idPais=<?php echo $pais->getIdPais(); ?>" class="">Modificar</a> | 
                    <a href="../../modulos/provincia/listado.php?idPais=<?php echo $pais->getIdPais(); ?>" class="">Provincias/Estados</a>
                </td>

            </tr>
        <?php endforeach ?>    
    </table>
</body>
</html>