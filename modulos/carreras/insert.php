<?php
require_once "../../class/MySql.php";
require_once "../../class/Carrera.php";    
require_once "../../configs.php";  

$mensaje='';

if(isset($_GET['mj'])){
    $mj=$_GET['mj'];
    if ($mj==CORRECT_INSERT_CODE){
        $mensaje=CORRECT_INSERT_MENSAJE;?>
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
    <link rel="stylesheet" href="/proyecto-modulos/style/styleInsert.css">
    <link rel="stylesheet" href="/proyecto-modulos/style/menu.css" class="">
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Agregar Carrera</title>
    <title>Agregar nuevo</title>
</head>

<?php require_once "../../menu.php";?>

<body>

    <form action="procesar_insert.php" method="POST" class="formulario">
        <h1 class="titulo"> Registro de Carrera</h1>
        <br>
        <div><input type="text" name=Nombre placeholder="Carrera Nombre"></div>
        <div><input type="number" name=AnioDuracion placeholder="Duracion en Años"></div>
        <div><input type="submit" name="Guardar" value="Guardar"></div>
        <div><input type="submit" name="Cancelar" value="Cancelar"></div>
    </form>
    
</body>
</html>