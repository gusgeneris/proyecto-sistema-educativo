<?php
    require_once "../../class/Carrera.php";
    require_once "../../configs.php";

    $idCarrera=$_GET["id"];
    $idCicloLectivo=$_GET["idCiclo"];
    $carrera=Carrera::listadoPorId($idCarrera);
    $nombreCarrera=$carrera->getNombre();
    $anioDuracion=$carrera->getDuracionAnios();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/proyecto-modulos/style/styleInsert.css">
    <link rel="stylesheet" href="/proyecto-modulos/style/menu.css" class="">
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Modificar Carrera</title>
</head>

    <?php require_once "../../menu.php";?>

<body>

<form action="procesar_actualizar.php" method="post" class="formulario">
    <h1 class="titulo">Ingrese los nuevos datos</h1>
    <br>
    <div class="">
        <input name="IdCiclo" type="hidden" value="<?php echo $idCicloLectivo;?>">
    </div>
    <div class="">
        <input name="IdCarrera" type="hidden" value="<?php echo $carrera->getIdCarrera();?>">
    </div>
    <div class="">
        <input name="Nombre" type="text" value="<?php echo $carrera->getNombre();?>">
    </div>
    <div class="">
        <input name="DuracionAnios" type="number" value="<?php echo $carrera->getDuracionAnios();?>">
    </div>
    <div class="">
        <input name="Actualizar" type="submit" value="Actualizar">
    </div>
    <div class="">  
        <input name="Cancelar" type="submit" value="Cancelar">
    </div>
</form>

</body>
</html>