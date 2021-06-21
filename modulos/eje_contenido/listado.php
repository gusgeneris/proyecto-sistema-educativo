<?php
require_once "../../class/EjeContenido.php";

$eje=new EjeContenido();

$idMateria=$_GET['idMateria'];
$idCarrera=$_GET['idCarrera'];



$lista=EjeContenido::obtenerPorIdMateria($idMateria,$idCarrera);
#highlight_string(var_export($lista,true));



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/proyecto-modulos/style/styleInsert.css" class="">
    <link rel="stylesheet" href="/proyecto-modulos/style/menu.css" class="">
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Lista ejes</title>

</head>
<?php require_once "../../menu.php";?>
<body class="body-listuser">
    <br>
    <br>
    <h1 class="titulo">Lista de Eje Contenido</h1>
    <br>
    <br>
    <div><a href="../eje_contenido/insert.php?idMateria=<?php echo $idMateria?>&idCarrera=<?php echo $idCarrera?>">Agregar Eje Contenido</a></div>
    <br>
    <br>

    <form >

    <table class="tabla" method="GET">
        <tr >
            <th> ID Eje</th>
            <th> Numero de Eje</th>
            <th> Descripcion</th>
            <th> Acciones</th>

        </tr>
        <?php foreach ($lista as $contenido ):?> 
            <tr >
                <td >
                    <?php echo $contenido->getIdEjeContenido(); ?>
                </td>
                <td>
                    <?php echo $contenido->getNumero(); ?>                
                </td>
                <td>
                    <?php echo $contenido->getDescripcion(); ?>
                </td>
                <td>
                    <a href="dar_baja.php?id=<?php echo $contenido->getIdEjeContenido(); ?>&idMateria=<?php echo $idMateria?>&idCarrera=<?php echo $idCarrera?>" class="">borrar</a>
                    <a href="modificar.php?id=<?php echo $contenido->getIdEjeContenido(); ?>&idMateria=<?php echo $idMateria?>&idCarrera=<?php echo $idCarrera?>" class="">modificar</a>
                </td>
            </tr>
        <?php endforeach ?>
    
    </table>

</body>
</html>