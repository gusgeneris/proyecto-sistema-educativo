<?php
    require_once '../../class/CicloLectivo.php';
    require_once '../../class/Materia.php';
    require_once '../../class/Carrera.php';
    require_once '../../class/MySql.php'; 
    require_once "../../configs.php";  

    $idCarrera=$_GET["idCarrera"];

    $materia=new Materia();
    $listado=$materia->listadoMaterias();
    
    $idCicloLectivo=$_GET["idCiclo"];

    $carrera= Carrera::listadoPorId($idCarrera);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/proyecto-modulos/style/styleInsert.css">
    <link rel="stylesheet" href="/proyecto-modulos/style/menu.css" class="">
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Asigar Docente</title>
    <title>Asignar</title>
</head>

<?php require_once "../../menu.php";?>

<body class="body">

    

    <form action="procesar_asignar.php" method=POST class="formulario">
        <h3 class="titulo"> Asignar Materia a la Carrera: <?php echo $carrera ?> </h3>
        <br>

        <div><input type="hidden" name=IdCarrera value=<?php echo $idCarrera  ?>></div>
        <div><input type="hidden" name=IdCiclo value=<?php echo $idCicloLectivo  ?>></div>

        <br>

        <div class="">
            <select name="cboMateria" id="" class="">
                <option value="NULL" class="">Asigne Materia</option>
                <?php foreach($listado as $materia):?>
                <option value="<?php echo $materia->getIdMateria(); ?>" class=""><?php echo $materia?></option>
                <?php endforeach?>
            </select>
        </div>

        <br>

        <div class=""><input type="submit" class="" name="guardar" value="Guardar">
            <input name="Cancelar" type="submit" value="Cancelar">
        </div>               
    </form>

</body>

</html>