<?php
require_once "../../class/Barrio.php";
require_once "../../configs.php";
require_once "../../mensaje.php";

$idLocalidad=$_GET['idLocalidad'];

$lista = Barrio::listado();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/proyecto-modulos/style/tabla.css" class="">
    <link href="../../icon/fontawesome/css/all.css" rel="stylesheet"> <!--Estilos para iconos -->
    <link rel="stylesheet" href="../../style/menuVertical.css">
    <script src="../../jquery3.6.js"></script>
    <script type="text/javascript" src="../../script/menu.js" defer> </script>
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Agregar Barrio</title>
</head>

<?php require_once "../../menu.php";?>

<body class="body-listuser">
    <div class="titulo">
        <h1 class="titulo">Lista de Barrios</h1>
    </div>

    <div class="conteiner-btn-agregar">
        <button type="button" class="btn-agregar" > 
        <a href="insertar.php?idLocalidad=<?php echo $idLocalidad ?>">Agregar Barrio</a>
        </button>
    </div>
    
    <div class="conteiner3Columnas">
        <table class="tabla" >
            <thead>
                <tr >
                    <th> ID Barrio </th>
                    <th> ID Localidad </th>
                    <th> Nombre Barrio </th>

                    <th> Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($lista as $barrio ):?> 
                <tr >
                    <td >
                        <?php echo $barrio->getIdBarrio(); ?>
                    </td>
                    <td>
                        <?php echo $barrio->getIdLocalidad(); ?>
                    </td>
                    <td>
                        <?php echo $barrio->getNombre(); ?>
                    </td>

                    <td>
                        <a href="eliminar.php?idBarrio=<?php echo $barrio->getIdBarrio(); ?>&idLocalidad=<?php echo $barrio->getIdLocalidad();?>" class=""><img class="icon-a" src="../../icon/basurero.png" title="Eliminar" alt="Eliminar"></a>
                        <a href="modificar.php?idBarrio=<?php echo $barrio->getIdBarrio(); ?>&idLocalidad=<?php echo $barrio->getIdLocalidad();?>" class=""><img class="icon-a" src="../../icon/modificar.png" title="Modificar" alt="Modificar"></a>
                    </td>
                </tr>
            <?php endforeach ?>   
            </tbody> 
        </table>
    </div>
    <?php require_once "../../footer.php"?>     
</body>
</html>