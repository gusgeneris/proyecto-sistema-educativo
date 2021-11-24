<?php
require_once "../../class/Pais.php";
require_once "../../configs.php";

$lista = Pais::listado();

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../../icon/fontawesome/css/all.css" rel="stylesheet"> <!--Estilos para iconos -->
        <link rel="stylesheet" href="../../style/menuVertical.css">
        <link rel="stylesheet" href="../../style/mensaje.css">
        <script src="../../jquery3.6.js"></script>
        <script type="text/javascript" src="../../script/menu.js" defer> </script>
        <link rel="stylesheet" href="/proyecto-modulos/style/tabla.css">
        <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Agregar domicilio</title>
    </head>

    <?php 
        require_once "../../menu.php";
        
        require_once "../../mensaje.php";
    ?>

    <body class="body-listuser">
        <div class="titulo">
            <h1 class="titulo">Lista de Paises</h1>
        </div>

        <div class="conteiner-btn-agregar">
            <button type="button" class="btn-agregar" > 
                <a href="insert.php">Agregar Pais</a>
            </button>
        </div>
    
        <div class="conteiner3Columnas">
            <table class="tabla" method="GET">
                <thead>
                    <tr >
                        <th> Nombre</th>

                        <th> Acciones</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lista as $pais ):?> 
                    <tr >
                        <td>
                            <?php echo $pais->getNombre(); ?>
                        </td>

                        <td>
                            <?php if ($pais->getEstado() ==2){?>
                                <a href="dar_alta.php?id=<?php echo $pais->getIdPais(); ?>"><img class="icon-a" src="../../icon/alta.png" title="Dar Alta" alt="Dar Alta"></a> 
                            <?php }else{?>
                                <a href="eliminar.php?idPais=<?php echo $pais->getIdPais(); ?>" class=""><img class="icon-a" src="../../icon/basurero.png" title="Eliminar" alt="Eliminar"></a>
                                <a href="modificar.php?idPais=<?php echo $pais->getIdPais(); ?>" class=""><img class="icon-a" src="../../icon/modificar.png" title="Modificar" alt="Modificar"></a>
                                <a href="../../modulos/provincia/listado.php?idPais=<?php echo $pais->getIdPais(); ?>" class=""><img class="icon-a" src="../../icon/gps.png" title="Provincias/Estados" alt="Provincias/Estados"></a>
                            <?php }?>
                        </td>

                    </tr>
                    <?php endforeach ?>   
                </tbody> 
            </table>
        </div>
        
        <?php require_once "../../footer.php"?> 
    </body>
</html>