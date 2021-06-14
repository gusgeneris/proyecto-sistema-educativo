<?php
require_once "../../class/Carrera.php";
require_once "../../configs.php";

$carrera=new Carrera();

$listadoCarreras=$carrera->listadoCarreras();

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
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Listado Carreras</title>
    <title>Document</title>
</head>
<body class="body-listuser">


    <?php require_once "../../menu.php";?>
    <br>
    <br>
    <h1 class="titulo">Lista de Carreras</h1>
    <br>
    <br>
    <table class="tabla">
    <th>Id Carrera</th>
    <th>Nombre</th>
    <th>Duracion en Años</th>
    <th>Acciones</th>
    <tr>
        <?php foreach ($listadoCarreras as $carrera):?>
        <tr>
            <td>
                <?php echo $carrera->getIdCarrera()?>
            </td>
            <td>
                <?php echo $carrera->getNombre()?> 
            </td>
            <td>
                <?php echo $carrera->getDuracionAnios()?>
            </td>
            <td>
                <a href="modificar.php?id=<?php echo $carrera->getIdCarrera()?>">modificar</a> <a href="dar_baja.php?id=<?php echo $carrera->getIdCarrera()?>">borrar</a>
            </td>
            <?php endforeach?>
        </tr>
    </tr>


    
    </table>

</body>
</html>