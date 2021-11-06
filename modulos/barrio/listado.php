<?php
require_once "../../class/Barrio.php";
require_once "../../configs.php";

$idLocalidad=$_GET['idLocalidad'];

$lista = Barrio::listado();


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
    <link href="../../icon/fontawesome/css/all.css" rel="stylesheet"> <!--Estilos para iconos -->
    <link rel="stylesheet" href="../../style/menuVertical.css">
    <script src="../../jquery3.6.js"></script>
    <script type="text/javascript" src="../../script/menu.js" defer> </script>
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Agregar Barrio</title>
</head>

<?php require_once "../../menu.php";?>

<body class="body-listuser">
    <br>
    <br>
    <h1 class="titulo">Lista de Barrios</h1>
    <br>
    <br>

    <a href="insertar.php?idLocalidad=<?php echo $idLocalidad ?>">Agregar Barrio</a>
 
    <table class="tabla" method="GET">
        <tr >
            <th> ID Barrio </th>
            <th> ID Localidad </th>
            <th> Nombre Barrio </th>

            <th> Acciones</th>

        </tr>
        <?php foreach ($lista as $barrio ):?> 
            <tr >
                <td >
                    <?php echo $barrio->getIdBarrio(); ?>
                </td>
                <td>
                    <?php echo $barrio->getIdLocalidad(); ?>
                </td>
                <td>
                    <?php echo $barrio->getNombre(); ?>
                </td>

                <td>
                    <a href="eliminar.php?idBarrio=<?php echo $barrio->getIdBarrio(); ?>&idLocalidad=<?php echo $barrio->getIdLocalidad();?>" class="">Borrar</a>
                    <a href="modificar.php?idBarrio=<?php echo $barrio->getIdBarrio(); ?>&idLocalidad=<?php echo $barrio->getIdLocalidad();?>" class="">Modificar</a>
                </td>

            </tr>
        <?php endforeach ?>    
    </table>
</body>
</html>