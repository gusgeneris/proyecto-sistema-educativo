<?php
    require_once '../../class/CicloLectivo.php';
    require_once '../../class/Materia.php';
    require_once '../../class/Carrera.php';
    require_once '../../class/MySql.php'; 
    require_once "../../configs.php";  

    $idCicloLectivo=$_GET["idCiclo"];

    $carrera=new Carrera();
    $listado=$carrera->listadoCarreras();

    $cicloLectivo=CicloLectivo::obtenerTodoPorId($idCicloLectivo);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/proyecto-modulos/style/styleInsert.css">
    <link rel="stylesheet" href="/proyecto-modulos/style/menu.css" class="">
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Asigar Carrera</title>
    <title>Asignar</title>
</head>

<?php require_once "../../menu.php";?>

<body class="body">

    

    <form action="procesar_asignar.php" method=POST class="formulario">
        <h3 class="titulo"> Asignar Carrera al Ciclo Lectivo: <?php echo $cicloLectivo ?> </h3>
        <br>

        <div><input type="hidden" name=IdCiclo value=<?php echo $idCicloLectivo  ?>></div>

        <br>

        <div class="">
            <select name="Carrera" id="" class="">
                <option value="NULL" class="">Asigne Carrera</option>
                <?php foreach($listado as $carrera):?>
                <option value="<?php echo $carrera->getIdCarrera(); ?>" class=""><?php echo $carrera?></option>
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