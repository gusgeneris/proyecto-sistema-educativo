<?php
require_once "../../class/Horario.php";

$lista=Horario::listaTodos();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/proyecto-modulos/style/styleInsert.css" class="">
    <link rel="stylesheet" href="/proyecto-modulos/style/menu.css" class="">
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Lista horarios</title>

</head>
<?php require_once "../../menu.php";?>
<body class="body-listuser">
    <br>
    <br>
    <h1 class="titulo">Lista de Horarios</h1>
    <br>
    <br>

    <form >

    <table class="tabla" method="GET">
        <tr >
            <th> ID Horario</th>
            <th> Numero</th>
            <th> Hora Inicio</th>
            <th> Hora Fin</th>

        </tr>
        <?php foreach ($lista as $horario ):?> 
            <tr >
                <td >
                    <?php echo $horario->getIdHorario(); ?>
                </td>
                <td>
                    <?php echo $horario->getHoraInicio(); ?>
                </td>
                <td>
                    <?php echo $horario->getHoraFin(); ?>
                </td>
                <td>
                    <?php echo $horario->getNumero(); ?>
                </td>
                <td>
                    <a href="dar_baja.php?id=<?php echo $horario->getIdHorario(); ?>" class="">borrar</a>
                    <a href="modificar.php?id= <?php echo $horario->getIdhorario(); ?>" class="">modificar</a>
                </td>
            </tr>
        <?php endforeach ?>
    
    </table>

</body>
</html>