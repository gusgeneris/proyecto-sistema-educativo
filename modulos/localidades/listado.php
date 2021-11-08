<?php
require_once "../../class/Localidad.php";
require_once "../../configs.php";
require_once "../../mensaje.php";

$idProvincia=$_GET['idProvincia'];

$lista = Localidad::listadoPorProvincia($idProvincia);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/proyecto-modulos/style/tabla.css">
    <link href="../../icon/fontawesome/css/all.css" rel="stylesheet"> <!--Estilos para iconos -->
    <link rel="stylesheet" href="../../style/menuVertical.css">
    <script src="../../jquery3.6.js"></script>
    <script type="text/javascript" src="../../script/menu.js" defer> </script>
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Agregar domicilio</title>
</head>

<?php require_once "../../menu.php";?>

<body class="body-listuser">
    <div class="titulo">
        <h1 class="titulo">Lista de Localidades</h1>
    </div>

    <div class="conteiner-btn-agregar">
        <button type="button" class="btn-agregar" > 
            <a href="insert.php?idProvincia=<?php echo $idProvincia ?>">Agregar Localidad</a>
        </button>
    </div>
    
    <div class="conteiner3Columnas">
        <table class="tabla" method="GET">
            <thead>
                <tr >

                    <th> ID Localidad </th>
                    <th> Nombre</th>
                    <th> Acciones</th>

                </tr>
            </thead>
            <tbody>
            <?php foreach ($lista as $localidad ):?> 
                <tr >
                    <td >
                        <?php echo $localidad->getIdLocalidad(); ?>
                    </td>
                    <td>
                        <?php echo $localidad->getNombre(); ?>
                    </td>

                    <td>
                        <a href="eliminar.php?idLocalidad=<?php echo $localidad->getIdLocalidad();?>&idProvincia=<?php echo $localidad->getIdProvincia();?>" class=""><img class="icon-a" src="../../icon/basurero.png" title="Eliminar" alt="Eliminar"></a>
                        <a href="modificar.php?idLocalidad=<?php echo $localidad->getIdLocalidad(); ?>&idProvincia=<?php echo $localidad->getIdProvincia();?>" class=""><img class="icon-a" src="../../icon/modificar.png" title="Modificar" alt="Modificar"></a>
                        <a href="../barrio/listado?idLocalidad=<?php echo $localidad->getIdLocalidad(); ?>&idProvincia=<?php echo $localidad->getIdProvincia();?>" class=""><img class="icon-a" src="../../icon/gps.png" title="Barrios" alt="Barrios"></a>
                    </td>

                </tr>
            <?php endforeach ?> 
            </tbody>   
        </table>
    </div>
    <?php require_once "../../footer.php"?> 
</body>
</html>