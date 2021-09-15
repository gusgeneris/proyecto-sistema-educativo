<?php
require_once "../../class/Localidad.php";
require_once "../../configs.php";

$idProvincia=$_GET['idProvincia'];

$lista = Localidad::listadoPorProvincia($idProvincia);

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
    <h1 class="titulo">Lista de Localidades</h1>
    <br>
    <br>

    <a href="insert.php?idProvincia=<?php echo $idProvincia ?>">Agregar Localidad</a>
 
    <table class="tabla" method="GET">
        <tr >

            <th> ID Localidad </th>
            <th> Nombre</th>
            <th> Acciones</th>

        </tr>
        <?php foreach ($lista as $localidad ):?> 
            <tr >
                <td >
                    <?php echo $localidad->getIdLocalidad(); ?>
                </td>
                <td>
                    <?php echo $localidad->getNombre(); ?>
                </td>

                <td>
                    <a href="eliminar.php?idLocalidad=<?php echo $localidad->getIdLocalidad();?>&idProvincia=<?php echo $localidad->getIdProvincia();?>" class="">Borrar</a> | 
                    <a href="modificar.php?idLocalidad=<?php echo $localidad->getIdLocalidad(); ?>&idProvincia=<?php echo $localidad->getIdProvincia();?>" class="">Modificar</a> | 
                    <a href="../barrio/barrios?idLocalidad=<?php echo $localidad->getIdLocalidad(); ?>&idProvincia=<?php echo $localidad->getIdProvincia();?>" class="">Barrios</a>
                </td>

            </tr>
        <?php endforeach ?>    
    </table>
</body>
</html>