<?php
    require_once '../../class/MySql.php'; 
    require_once "../../class/Modulo.php";
    
    $mensaje='';
    
    if(isset($_GET['mj'])){
        $mj=$_GET['mj'];
        if ($mj==CORRECT_INSERT_CODE){
            $mensaje=CORRECT_INSERT_MENSAJE;?>
            <div class="mensajes"><?php echo $mensaje;?></div><?php
        }
    };
    $idPerfil=$_GET["idPerfil"];
    $lista=Modulo::obtenerTodos();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/proyecto-modulos/style/styleInsert.css">
    <link rel="stylesheet" href="/proyecto-modulos/style/menu.css" class="">
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Agregar Perfil</title>
    <title>Insertar Nuevo</title>
</head>

<?php require_once "../../menu.php";?>

<body class="body">

    <form action="procesar_insert.php" method=POST class="formulario">
        <h1 class="titulo"> Seleccione el modulo</h1>

        <?php foreach ($lista as $modulo):?>
        <tr>
            <td><input type="hidden" name="idPerfil" value="<?php echo $idPerfil ?>"></td>
            <td>
                <label for=""><input type="checkbox" name="check_lista[]" value="<?php echo $modulo->getIdModulo()?>"><?php echo $modulo->getNombre()?> </label>
            </td>
            <br>
            <?php endforeach?>
        <div class="">
            <input type="submit" class="" name="guardar" value="Guardar">
            <input name="Cancelar" type="submit" value="Cancelar">
        </div>               
    </form>

</body>

</html>