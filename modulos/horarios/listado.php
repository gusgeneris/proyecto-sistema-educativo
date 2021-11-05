<?php
require_once "../../class/Horario.php";
require_once "../../class/Dia.php";

$lista=Horario::listaTodos();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/proyecto-modulos/style/menu.css" class="">
    
    <link rel="stylesheet" href="/proyecto-modulos/style/tabla.css" class="">
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Lista horarios</title>

</head>
<?php require_once "../../menu.php";?>
<body class="body-listuser">
    
    <div class="titulo">
        <h1>Lista de Horarios</h1>
    </div>

    <div class="conteiner-btn-agregar">
        <button type="button" class="btn-agregar" > 
            <a href="insert.php">agregar nuevo</a>
        </button>
    </div>
    
    <form >

    <div class="conteiner3Columnas">
        <table class="tabla" >
            <thead>
                <tr >
                    <th> ID Horario</th>
                    <th> Hora Inicio</th>
                    <th> Hora Fin</th>
                    <th> Numero</th>
                    <th> Id Dia</th>
                    <th> Acciones</th>

                </tr>
            </thead>
            <tbody>
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
                        <?php $dia=Dia::obtenerPorId($horario->getIdDia()); echo $dia->getDescripcion(); ?>
                    </td>
                    <td>
                        <a href="dar_baja.php?id=<?php echo $horario->getIdHorario(); ?>" class="">borrar</a>
                        <a href="modificar.php?id= <?php echo $horario->getIdhorario(); ?>" class="">modificar</a>
                    </td>
                </tr>
            <?php endforeach ?>
            </tbody>
        
        </table>
    </div>

</body>
</html>