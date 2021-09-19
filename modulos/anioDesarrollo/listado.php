<?php
require_once "../../class/AnioDesarrollo.php";

$lista=AnioDesarrollo::listaTodos();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/proyecto-modulos/style/styleInsert.css" class="">
    <link rel="stylesheet" href="/proyecto-modulos/style/menu.css" class="">
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Lista cicloLectivos</title>

</head>
<?php require_once "../../menu.php";?>
<body class="body-listuser">
    <br>
    <br>
    <h1 class="titulo">Lista de Años de Desarrollo para Materias</h1>
    <br>
    <br>

    <form >

    <table class="tabla" method="GET">
        <tr >
            <th> ID Anio Desarrollo</th>
            <th> Año Desarrollo</th>
            <th> Acciones</th>


        </tr>
        <?php foreach ($lista as $anioDesarrollo ):?> 
            <tr >
                <td >
                    <?php echo $anioDesarrollo->getIdAnioDesarrollo(); ?>
                </td>
                <td>
                    <?php echo $anioDesarrollo->getDetalleAnio(); ?>
                </td>
                <td>
                    <a href="dar_baja.php?id=<?php echo $anioDesarrollo->getIdAnioDesarrollo(); ?>" class="">Borrar</a> |
                    <a href="modificar.php?id=<?php echo $anioDesarrollo->getIdAnioDesarrollo(); ?>" class="">Modificar</a>
                </td>
            </tr>
        <?php endforeach ?>
    
    </table>

</body>
</html>