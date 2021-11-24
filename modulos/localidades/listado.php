<?php
    require_once "../../class/Localidad.php";
    require_once "../../class/Provincia.php";
    require_once "../../class/Pais.php";
    require_once "../../configs.php";

    $idProvincia=$_GET['idProvincia'];
    $idPais=$_GET['idPais'];

    $lista = Localidad::listadoPorProvincia($idProvincia);
    $provincia=Provincia::obtenerPorIdProvincia($idProvincia);
    $nombreProvincia=$provincia->getNombre();


    
    $pais=Pais::obtenerPorIdPais($idPais);
    $nombrePais=$pais->getNombre();

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
        <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Agregar domicilio</title>
    </head>

    <?php
        require_once "../../menu.php";
        require_once "../../mensaje.php";
    ?>

    <body class="body-listuser">
        <div class="titulo">
            <h1 class="titulo">Lista de Localidades para el Pais-Provincia: <?php echo $nombrePais ?>/ <?php echo $nombreProvincia ?></h1>
        </div>

        <div class="conteiner-btn-agregar">
            <button type="button" class="btn-agregar" > 
                <a href="insert.php?idProvincia=<?php echo $idProvincia ?>&idPais=<?php echo $idPais ?>">Agregar Localidad</a>
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
                <?php foreach ($lista as $localidad ):?> 
                    <tr >
                        <td>
                            <?php echo $localidad->getNombre(); ?>
                        </td>

                        <td>
                        <?php if ($localidad->getEstado() ==2){?>
                                <a href="dar_alta.php?id=<?php echo $localidad->getIdLocalidad() ?>&idProvincia=<?php echo $localidad->getIdProvincia();?>&idPais=<?php echo $idPais;?>"><img class="icon-a" src="../../icon/alta.png" title="Dar Alta" alt="Dar Alta"></a> 
                            <?php }else{?>
                                <a href="eliminar.php?idLocalidad=<?php echo $localidad->getIdLocalidad();?>&idProvincia=<?php echo $localidad->getIdProvincia();?>&idPais=<?php echo $idPais;?>" class=""><img class="icon-a" src="../../icon/basurero.png" title="Eliminar" alt="Eliminar"></a>
                                <a href="modificar.php?idLocalidad=<?php echo $localidad->getIdLocalidad(); ?>&idProvincia=<?php echo $localidad->getIdProvincia();?>&idPais=<?php echo $idPais;?>" class=""><img class="icon-a" src="../../icon/modificar.png" title="Modificar" alt="Modificar"></a>
                                <a href="../barrio/listado?idLocalidad=<?php echo $localidad->getIdLocalidad(); ?>&idProvincia=<?php echo $localidad->getIdProvincia();?>&idPais=<?php echo $idPais;?>" class=""><img class="icon-a" src="../../icon/gps.png" title="Barrios" alt="Barrios"></a>
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