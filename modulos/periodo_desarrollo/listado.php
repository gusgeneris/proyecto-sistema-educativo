<?php
require_once "../../class/PeriodoDesarrollo.php";
require_once "../../mensaje.php";

$lista=PeriodoDesarrollo::listaTodos();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../icon/fontawesome/css/all.css" rel="stylesheet"> <!--Estilos para iconos -->
    <link rel="stylesheet" href="../../style/menuVertical.css">
    <link rel="stylesheet" href="/proyecto-modulos/style/tabla.css" class="">
    <script src="../../jquery3.6.js"></script>
    <script type="text/javascript" src="../../script/menu.js" defer> </script>
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Lista de periodo de desarrollo</title>

</head>
<?php require_once "../../menu.php";?>
<body class="body-listuser">
    <div class="titulo">
        <h1>Lista de Años de Desarrollo para Materias</h1>
    </div>

    <div class="conteiner3Columnas">

        <table class="tabla" method="GET">
            <thead>
                <tr >
                    <th> ID Periodo Desarrollo</th>
                    <th> Año Desarrollo</th>
                    <th> Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($lista as $periodoDesarrollo ):?> 
                <tr >
                    <td >
                        <?php echo $periodoDesarrollo->getIdPeriodoDesarrollo(); ?>
                    </td>
                    <td>
                        <?php echo $periodoDesarrollo->getDetallePeriodo(); ?>
                    </td>
                    <td>
                        <a href="dar_baja.php?id=<?php echo $periodoDesarrollo->getIdPeriodoDesarrollo(); ?>" class=""><img class="icon-a" src="../../icon/basurero.png" title="Eliminar" alt="Eliminar"></a>
                        <a href="modificar.php?id=<?php echo $periodoDesarrollo->getIdPeriodoDesarrollo(); ?>" class=""><img class="icon-a" src="../../icon/modificar.png" title="Modificar" alt="Modificar"></a>
                    </td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <?php require_once "../../footer.php"?>  

</body>
</html>