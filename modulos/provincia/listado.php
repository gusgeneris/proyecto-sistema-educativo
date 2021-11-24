<?php
require_once "../../class/Provincia.php";
require_once "../../class/Pais.php";
require_once "../../configs.php";

$idPais=$_GET['idPais'];
$pais=Pais::obtenerPorIdPais($idPais);
$nombrePais=$pais->getNombre();


$lista = Provincia::listadoPorPais($idPais);

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/proyecto-modulos/style/tabla.css">
        <link href="../../icon/fontawesome/css/all.css" rel="stylesheet"> <!--Estilos para iconos -->
        <link rel="stylesheet" href="../../style/menuVertical.css">
        <link rel="stylesheet" href="../../style/mensaje.css">
        <script src="../../jquery3.6.js"></script>
        <script type="text/javascript" src="../../script/menu.js" defer> </script>
        <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Listado de Provincias</title>
    </head>

    <?php 
        require_once "../../menu.php";
        require_once "../../mensaje.php";
    ?>

    <body class="body-listuser">
        <div class="titulo">
            <h1>Lista de Provincias del Pais: <?php echo $nombrePais ?></h1>
        </div>

        <div class="conteiner-btn-agregar">
            <button type="button" class="btn-agregar" > 
                <a href="insert.php?idPais=<?php echo $idPais ?>">Agregar Provincia</a>
            </button>
        </div>
        
        <div class="conteiner3Columnas">
            <table class="tabla" method="GET">
                <thead>
                    <tr>
                        <th> Nombre</th>
                        <th> Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($lista as $provincia ):?> 
                    <tr >
                        
                        <td>
                            <?php echo $provincia->getNombre(); ?>
                        </td>

                        <td>
                        <?php if ($provincia->getEstado() ==2){?>
                            <a href="dar_alta.php?id=<?php echo $provincia->getIdProvincia(); ?>&idPais=<?php echo $provincia->getIdPais();?>"><img class="icon-a" src="../../icon/alta.png" title="Dar Alta" alt="Dar Alta"></a> 
                        <?php }else{?>
                            <a href="eliminar.php?idProvincia=<?php echo $provincia->getIdProvincia();?>&idPais=<?php echo $provincia->getIdPais();?>" class=""><img class="icon-a" src="../../icon/basurero.png" title="Eliminar" alt="Eliminar"></a>
                            <a href="modificar.php?idProvincia=<?php echo $provincia->getIdProvincia(); ?>&idPais=<?php echo $provincia->getIdPais();?>" class=""><img class="icon-a" src="../../icon/modificar.png" title="Modificar" alt="Modificar"></a>
                            <a href="../localidades/listado.php?idProvincia=<?php echo $provincia->getIdProvincia(); ?>&idPais=<?php echo $provincia->getIdPais();?>" class=""><img class="icon-a" src="../../icon/gps.png" title="Localidades" alt="Localidades"></a>
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