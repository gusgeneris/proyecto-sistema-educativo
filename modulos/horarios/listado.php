<?php
require_once "../../class/Horario.php";
require_once "../../class/Dia.php";
require_once "../../configs.php";

$lista=Horario::listaTodos();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../icon/fontawesome/css/all.css" rel="stylesheet"> <!--Estilos para iconos -->
    <link rel="stylesheet" href="../../style/menuVertical.css">
    <script src="../../jquery3.6.js"></script>
    <script type="text/javascript" src="../../script/menu.js" defer> </script>
    <link rel="stylesheet" href="/proyecto-modulos/style/tabla.css">
    <link rel="stylesheet" href="../../style/mensaje.css">
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Lista horarios</title>

</head>

<body class="body-listuser">

    <?php require_once "../../menu.php";
    require_once "../../mensaje.php";?>
    
    <div class="titulo">
        <h1>Lista de Horarios</h1>
    </div>

    <div class="conteiner-btn-agregar">
        <button type="button" class="btn-agregar" > 
            <a href="insert.php">Agregar nuevo horario</a>
        </button>
    </div>
    
    <form >

    <div class="conteiner3Columnas">
        <table class="tabla" >
            <thead>
                <tr >
                    <th> Modulo</th>
                    <th> Dia</th>
                    <th> Hora Inicio</th>
                    <th> Hora Fin</th>
                    <th> Acciones</th>

                </tr>
            </thead>
            <tbody>
            <?php foreach ($lista as $horario ):?> 
                <tr >
                    <td>
                        <?php echo $horario->getNumero(); ?>
                    </td>
                    <td>
                        <?php $dia=Dia::obtenerPorId($horario->getIdDia()); echo $dia->getDescripcion(); ?>
                    </td>
                    <td>
                        <?php echo $horario->getHoraInicio(); ?>
                    </td>
                    <td>
                        <?php echo $horario->getHoraFin(); ?>
                    </td>
                    <td>
                        <div class="icon">
                            <?php 
                                $idHorario= $horario->getIdHorario();

                                $estado=$horario->getEstado();

                                if($estado==2){?>
                                
                                    <a href="dar_alta.php?id=<?php echo $idHorario?>"><img class="icon-a" src="../../icon/alta.png" title="Dar Alta" alt="Dar Alta"></a>    

                            <?php }else{ ?>

                            <a href="dar_baja.php?id=<?php echo $horario->getIdHorario(); ?>"><img class="icon-a" src="../../icon/basurero.png" title="Eliminar" alt="Eliminar"></a>
                            <a href="modificar.php?id=<?php echo $horario->getIdhorario(); ?>"><img class="icon-a" src="../../icon/modificar.png" title="Modificar" alt="Modificar"></a>
                            
                            <?php } ?>
                        </div>
                       
                    </td>
                </tr>
            <?php endforeach ?>
            </tbody>
        
        </table>
    </div>
    <?php require_once "../../footer.php"?> 
</body>
</html>