<?php
    require_once '../../class/MySql.php'; 
    require_once "../../configs.php";  
    require_once "../../class/Perfil.php";
    
    $mensaje='';
    
    if(isset($_GET['mj'])){
        $mj=$_GET['mj'];
        if ($mj==CORRECT_INSERT_CODE){
            $mensaje=CORRECT_INSERT_MENSAJE;?>
            <div class="mensajes"><?php echo $mensaje;?></div><?php
        }
    };
    $idPersona=$_GET['idPersona'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/proyecto-modulos/style/styleInsert.css">
    <link rel="stylesheet" href="/proyecto-modulos/style/menu.css" class="">
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Aregar Domicilio</title>
    <title>Insert</title>
</head>

<?php require_once "../../menu.php";?>

<body class="body">

    <form action="procesador_insert.php" method=POST class="formulario">
        <h1 class="titulo"> Registro de Domicilio</h1>
        <div class=""><input type="hidden" name="IdPersona" class="" value="<?php echo $idPersona?>"></div>
        <div class=""><input type="hidden" name="IdBarrio" class=""></div>
        <div class=""><input type="text" name="Detalle" class="" placeholder="Detalle Domicilio"></div>
        
        <div class=""><input type="submit" class="" name="guardar" value="Guardar">
            <input name="Cancelar" type="submit" value="Cancelar">
        </div>               
    </form>

</body>

</html>