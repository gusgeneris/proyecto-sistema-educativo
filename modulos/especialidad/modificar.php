<?php
require_once "../../class/Especialidad.php";
require_once "../../configs.php";

if(isset($_GET['id'])){
    $id=$_GET['id']; 
    $idDocente=$_GET['idDocente']; 

}

$especialidad= Especialidad::obtenerPorId($id);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/proyecto-modulos/style/styleInsert.css">
    <link rel="stylesheet" href="/proyecto-modulos/style/menu.css" class="">
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Modificar Eje Contenido</title>
</head>
<?php require_once "../../menu.php";?>

<body class="modif-user">
    

    <form action="procesar_actualizar.php" method="POST"class="formulario">
        <h1 class="titulo">Ingrese los nuevos datos</h1>
    
        <table>
            <div class=""> 
                <input name="IdEspecialidad" type="hidden" class="" value="<?php echo $especialidad->getIdEspecialidad(); ?>">
            </div>
            <div class=""> 
                <input name="IdDocente" type="hidden" class="" value="<?php echo $idDocente; ?>">
            </div>
            <div> Descripcion
                <input name="Descripcion" type="text" class="" value="<?php echo $especialidad->getDescripcion(); ?>">
            </div>
            <div> 
                <input name="Guardar" type="submit" value="Actualizar" >
                <input name="Cancelar" type="submit" value="Cancelar">
            </div>
        </table>    
    
    </form>
    
</body>
</html>