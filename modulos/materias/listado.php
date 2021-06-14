<?php
require_once "../../class/Materia.php";
require_once "../../configs.php";

$materia=new Materia();

$listadomaterias=$materia->listadoMaterias();

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
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Listado Materias</title>
</head>
<body class="body-listuser">


    <?php require_once "../../menu.php";?>
    <br>
    <br>
    <h1 class="titulo">Lista de Materias</h1>
    <br>
    <br>
    <table class="tabla">
        <th>Id materia</th>
        <th>Nombre</th>
        <th>Acciones</th>
        <tr>
            <?php foreach ($listadomaterias as $materia):?>
            <tr>
                <td>
                    <?php echo $materia->getIdmateria()?>
                </td>
                <td>
                    <?php echo $materia->getNombre()?> 
                </td>
                <td>
                    <a href="modificar.php?id=<?php echo $materia->getIdMateria()?>">modificar</a>  |  <a href="dar_baja.php?id=<?php echo $materia->getIdMateria()?>">borrar</a>
                </td>
                <?php endforeach?>
            </tr>
        </tr>
    </table>
</body>
</html>