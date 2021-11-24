<?php
require_once "../../class/PeriodoDesarrollo.php";

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
    <link rel="stylesheet" href="../../style/mensaje.css">
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Lista de periodo de desarrollo</title>

</head>
    <?php require_once "../../menu.php";
    require_once "../../mensaje.php";?>
<body class="body-listuser">

    <div class="titulo">
        <h1>Lista de Años de Desarrollo para Materias</h1>
    </div>

    <div class="conteiner-btn-agregar">
        <button type="button" class="btn-agregar" > 
            <a href="insert.php">Agregar Nuevo Año de Desarrollo</a> 
        </button>
    </div>

    <div class="conteiner3Columnas">

        <table class="tabla" method="GET">
            <thead>
                <tr >
                    <th> Periodo Desarrollo</th>
                    <th> Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($lista as $periodoDesarrollo ):?> 
                <tr >
                    <td>
                        <?php echo $periodoDesarrollo->getDetallePeriodo(); ?>
                    </td>
                    <td>

                    <?php    
                        $estado=$periodoDesarrollo->getEstado();                        
                        if ($estado==2){?>
                            <a href="dar_alta.php?id=<?php echo $periodoDesarrollo->getIdPeriodoDesarrollo()?>"><img class="icon-a" src="../../icon/alta.png" title="Dar Alta" alt="Dar Alta"></a>
                    <?php }else{ ?>
                        <a href="#" onclick="consulta(<?php echo $periodoDesarrollo->getIdPeriodoDesarrollo()?>)"><img class="icon-a" src="../../icon/basurero.png" title="Eliminar" alt="Eliminar"></a>
                        <a href="modificar.php?id=<?php echo $periodoDesarrollo->getIdPeriodoDesarrollo(); ?>" class=""><img class="icon-a" src="../../icon/modificar.png" title="Modificar" alt="Modificar"></a>
                    <?php } ?> 
                    </td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <?php require_once "../../footer.php"?>  

</body>

    <script>
        function consulta(idPeriodoDesarrollo){

            if (confirm("¿Estas deguro que deseas eliminar?"))
            {
                window.location.href="dar_baja.php?id="+idPeriodoDesarrollo;
            }
        }
    </script>
</html>