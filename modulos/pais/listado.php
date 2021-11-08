<?php
require_once "../../class/Pais.php";
require_once "../../configs.php";
require_once "../../mensaje.php";

$lista = Pais::listado();

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
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Agregar domicilio</title>
</head>

<?php require_once "../../menu.php";?>

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
                    <th> ID Pais </th>
                    <th> Nombre</th>

                    <th> Acciones</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($lista as $pais ):?> 
                <tr >
                    <td >
                        <?php echo $pais->getIdPais(); ?>
                    </td>
                    <td>
                        <?php echo $pais->getNombre(); ?>
                    </td>

                    <td>
                        <a href="eliminar.php?idPais=<?php echo $pais->getIdPais(); ?>" class=""><img class="icon-a" src="../../icon/basurero.png" title="Eliminar" alt="Eliminar"></a>
                        <a href="modificar.php?idPais=<?php echo $pais->getIdPais(); ?>" class=""><img class="icon-a" src="../../icon/modificar.png" title="Modificar" alt="Modificar"></a>
                        <a href="../../modulos/provincia/listado.php?idPais=<?php echo $pais->getIdPais(); ?>" class=""><img class="icon-a" src="../../icon/gps.png" title="Provincias/Estados" alt="Provincias/Estados"></a>
                    </td>

                </tr>
                <?php endforeach ?>   
            </tbody> 
        </table>
    </div>
    
    <?php require_once "../../footer.php"?> 
</body>
</html>