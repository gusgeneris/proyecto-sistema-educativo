<?php
    require_once "../../class/Materia.php";
    require_once "../../configs.php";

    $idMateria=$_GET["id"];
    $materia=Materia::listadoPorId($idMateria);
    $nombreMateria=$materia->getNombre();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/proyecto-modulos/style/styleInsert.css">
    <link rel="stylesheet" href="/proyecto-modulos/style/menu.css" class="">
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Modificar Materia</title>
</head>

    <?php require_once "../../menu.php";?>

<body>

<form action="procesar_actualizar.php" method="POST" class="formulario">
    <h1 class="titulo">Ingrese los nuevos datos</h1>
    <br>

    <div class="">
        <input name="idMateria" type="hidden" value="<?php echo $materia->getIdMateria();?>">
    </div>
    <div class="">
        <input name="Nombre" type="text" value="<?php echo $nombreMateria;?>">
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