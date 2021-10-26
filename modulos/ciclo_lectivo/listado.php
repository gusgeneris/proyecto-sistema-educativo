<?php
require_once "../../class/CicloLectivo.php";

$lista=CicloLectivo::listaTodos();

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
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Lista cicloLectivos</title>

</head>
<?php require_once "../../menu.php";?>
<body class="body-listuser">
    
    <div class="titulo-conteiner">
        <h1 class="titulo">Lista de Ciclos Lectivos</h1>
    </div>   

    <form >
    <div class="contenedor-lista">
        <table class="tabla" method="GET">
            <tr >
                <th> ID Ciclo Lectivo</th>
                <th> Año</th>
                <th> Acciones</th>


            </tr>
            <?php foreach ($lista as $cicloLectivo ):?> 
                <tr >
                    <td >
                        <?php echo $cicloLectivo->getIdCicloLectivo(); ?>
                    </td>
                    <td>
                        <?php echo $cicloLectivo->getAnio(); ?>
                    </td>
                    <td>
                        <a href="dar_baja.php?id=<?php echo $cicloLectivo->getIdCicloLectivo(); ?>" class="">Borrar</a> |
                        <a href="modificar.php?id=<?php echo $cicloLectivo->getIdCicloLectivo(); ?>" class="">Modificar</a> |
                        <a href="../carreras/listado_por_ciclo.php?idCiclo=<?php echo $cicloLectivo->getIdCicloLectivo(); ?>" class="">Listado de Carreras</a>
                    </td>
                </tr>
            <?php endforeach ?>
        
        </table>
    </div>       
</body>
<footer >
    <div class="footer">
        <p class="diseñadorPor">Diseñado por Sandoval Gustavo 2021</p>
    </div>
</footer>
</html>