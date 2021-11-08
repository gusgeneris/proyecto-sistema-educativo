<?php
require_once "../../class/Domicilio.php";
require_once "../../class/Persona.php";
require_once "../../class/Sexo.php";
require_once "../../configs.php";
require_once "../../mensaje.php";

$idPersona=$_GET['idPersona'];

$lista = Domicilio::listadoPorIdPersona($idPersona);

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
    <script type="text/javascript" src ="../../script/comboDomicilio.js"></script>
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Agregar domicilio</title>
</head>

<?php require_once "../../menu.php";?>

<body class="body-listuser">

    <div class="titulo">
        <h1>Lista de Domicilios</h1>
    </div>

    <div class="conteiner-btn-agregar">
        <button type="button" class="btn-agregar" >         
            <a href="insertar.php?idPersona=<?php echo $idPersona; ?>">Agregar Domicilio</a>
        </button>
    </div>

    <div class="conteiner3Columnas">
        <table class="tabla" method="GET">
            <thead>
                <tr >
                    <th> ID Domicilio</th>
                    <th> ID Barrio</th>
                    <th> ID Persona</th>
                    <th> Detalle</th>
                    <th> Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lista as $domicilio ):?> 
                    <tr >
                        <td >
                            <?php echo $domicilio->getIdDomicilio(); ?>
                        </td>
                        <td>
                            <?php echo $domicilio->getIdBarrio(); ?>
                        </td>
                        <td>
                            <?php echo $domicilio->getIdPersona(); ?>
                        </td>
                        <td>
                            <?php echo $domicilio->getDetalle(); ?>
                        </td>
                        <td>
                            <a href="eliminar.php?idDomicilio=<?php echo $domicilio->getIdDomicilio(); ?>&idPersona=<?php echo $domicilio->getIdPersona();?>" class=""><img class="icon-a" src="../../icon/basurero.png" title="Eliminar" alt="Eliminar"></a>
                            <a href="modificar.php?idBarrio=<?php echo $domicilio->getIdBarrio();?>&idDomicilio=<?php echo $domicilio->getIdDomicilio(); ?>&idPersona=<?php echo $domicilio->getIdPersona();?>" class=""><img class="icon-a" src="../../icon/modificar.png" title="Modificar" alt="Modificar"></a>
                        </td>

                    </tr>
                <?php endforeach ?>
            </tbody>    
        </table>
    </div>
    <?php require_once "../../footer.php"?>
</body>
</html>