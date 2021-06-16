<?php
require_once "../../class/CicloLectivo.php";
require_once "../../configs.php";

if(isset($_GET['id'])){
    $id=$_GET['id'];    
}

$CicloLectivo= CicloLectivo::obtenerTodoPorId($id);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/proyecto-modulos/style/styleInsert.css">
    <link rel="stylesheet" href="/proyecto-modulos/style/menu.css" class="">
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Modificar Ciclo Lectivo</title>
</head>
<?php require_once "../../menu.php";?>

<body class="modif-user">
    

    <form action="procesar_actualizar.php" method="POST"class="formulario">
        <h1 class="titulo">Ingrese el nuevo dato</h1>
    
        <table>
            <div class=""> 
                <input name="idCicloLectivo" type="hidden" class="" value="<?php echo $CicloLectivo->getIdCicloLectivo(); ?>">
            </div>
            <div> Año
                <input name="Año" type="text" class="" value="<?php echo $CicloLectivo->getAnio(); ?>">
            </div>
            <div> 
                <input name="Guardar" type="submit" value="Actualizar" >
                <input name="Cancelar" type="submit" value="Cancelar">
            </div>
        </table>    
    </form>
    
</body>
</html>