<?php
require_once "../../class/Domicilio.php";
require_once "../../class/Persona.php";
require_once "../../class/Sexo.php";
require_once "../../configs.php";

$idPersona=$_GET['idPersona'];

$lista = Domicilio::listadoPorIdPersona($idPersona);


$mensaje='';
    
if(isset($_GET['mj'])){
    $mj=$_GET['mj'];
    if ($mj==CORRECT_INSERT_CODE){
        $mensaje=CORRECT_INSERT_MENSAJE;?>
        <div class="mensajes"><?php echo $mensaje;?></div><?php
    }else if($mj==CORRECT_UPDATE_CODE){
        $mensaje=CORRECT_UPDATE_MENSAJE;?>
        <div class="mensajes"><?php echo $mensaje;?></div><?php
    }
};


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/proyecto-modulos/style/styleInsert.css" class="">
    <link rel="stylesheet" href="/proyecto-modulos/style/menu.css" class="">
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Agregar domicilio</title>
</head>

<?php require_once "../../menu.php";?>

<body class="body-listuser">
    <br>
    <br>
    <h1 class="titulo">Lista de Domicilios</h1>
    <br>
    <br>

    <a href="insertar.php?idPersona=<?php echo $idPersona; ?>">Agregar Domicilio</a>
 
    <table class="tabla" method="GET">
        <tr >
            <th> ID Domicilio</th>
            <th> ID Barrio</th>
            <th> ID Persona</th>
            <th> Detalle</th>

            <th> Acciones</th>

        </tr>
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
                    <a href="eliminar.php?idDomicilio=<?php echo $domicilio->getIdDomicilio(); ?>&idPersona=<?php echo $domicilio->getIdPersona();?>" class="">Borrar</a>
                    <a href="modificar.php?idBarrio=<?php echo $domicilio->getIdBarrio();?>&idDomicilio=<?php echo $domicilio->getIdDomicilio(); ?>&idPersona=<?php echo $domicilio->getIdPersona();?>" class="">Modificar</a>
                </td>

            </tr>
        <?php endforeach ?>    
    </table>
</body>
</html>