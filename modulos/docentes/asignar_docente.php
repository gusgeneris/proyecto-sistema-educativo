<?php
    require_once '../../class/Docente.php';
    require_once '../../class/Materia.php';
    require_once '../../class/Carrera.php';
    require_once '../../class/MySql.php'; 
    require_once "../../configs.php";  

    $idCarrera=$_GET["idCarrera"];
    $idMateria=$_GET["idMateria"];


    $listado=Docente::listadoDocente();
    $materia=Materia::listadoPorId($idMateria);
    $carrera=Carrera::listadoPorId($idCarrera);

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
        <h3 class="titulo"> Asignar Docente a la Materia: <?php echo $materia ?> / <?php echo $carrera ?> </h3>
        <br>

        <div><input type="hidden" name=IdCarrera value=<?php echo $idCarrera  ?>></div>
        <div><input type="hidden" name=IdMateria value=<?php echo $idMateria  ?>></div>

        <br>

        <div class="">
            <select name="Docente" id="" class="">
                <option value="NULL" class="">Asigne al Docente</option>
                <?php foreach($listado as $docente):?>
                <option value="<?php echo $docente->getIdDocente(); ?>" class=""><?php echo $docente." | Dni:"; echo $docente->getDni() ?></option>
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