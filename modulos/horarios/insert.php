<?php
    require_once '../../class/MySql.php'; 
    require_once "../../class/Horario.php";
    
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
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Agregar Horario</title>
    <title>Insertar</title>
</head>

<?php require_once "../../menu.php";?>

<body class="body">

    <form action="procesar_insert.php" method=POST class="formulario">
        <h1 class="titulo"> Registro de Alumnos</h1>
        <div class=""><input type="text" name="Numero" class="" placeholder="Numero"></div>
        <div class=""><input type="time" name="HoraInicio" class="" placeholder="Hora Inicio"></div>
        <div class=""><input type="time" name="HoraFin" class="" placeholder="Hora Fin"></div>
        <div class=""><input type="submit" class="" name="guardar" value="Guardar">
            <input name="Cancelar" type="submit" value="Cancelar">
        </div>               
    </form>

</body>

</html>