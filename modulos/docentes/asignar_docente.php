<?php
    require_once '../../class/Docente.php';
    require_once '../../class/Materia.php';
    require_once '../../class/Carrera.php';
    require_once '../../class/MySql.php'; 
    require_once "../../configs.php";  

    $idCarrera=$_GET["idCarrera"];
    $idMateria=$_GET["idMateria"];
    $idCicloLectivo=$_GET["idCicloLectivo"];
    


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
        <link rel="stylesheet" href="../../style/styleFormInsert.css">
        <link rel="stylesheet" href="/proyecto-modulos/style/menu.css" class="">
        <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Asigar Docente</title>
        <title>Asignar</title>
    </head>


    <body class="body">

        <?php require_once "../../menu.php";?>

        <div class="titulo">
            <h1> Asignar Docente a la Materia: <?php echo $materia ?> / <?php echo $carrera ?> </h1>
        </div>
        
        <div class="main">
            <form action="procesar_asignar.php" method=POST class="formulario">
                
                <div><input type="hidden" name=IdCarrera value=<?php echo $idCarrera  ?>></div>
                <div><input type="hidden" name=IdMateria value=<?php echo $idMateria  ?>></div>
                <div><input type="hidden" name=IdCicloLectivo value=<?php echo $idCicloLectivo  ?>></div>

                <div class="formGrup" id="GrupocboDocente">
                    <label for="cboDocente" class="formLabel ">Docente</label>
                    <div class="formGrupInput">
                        <select name="Docente" id="" class="">
                            <option value="NULL" class="">Asigne al Docente</option>
                            <?php foreach($listado as $docente):?>
                            <option value="<?php echo $docente->getIdDocente(); ?>" class=""><?php echo $docente." | Dni:"; echo $docente->getDni() ?></option>
                            <?php endforeach?>
                        </select>
                    </div>
                    <p class="formularioInputError"> Debe seleccionar una opcion </p> 
                </div>

                <div class="formGrupBtnEnviar">
                    <button type="submit" class="formButton" value ="FormInsertDocente" id="Guardar"> Guardar</button>
                </div>

                <div class="formGrupBtnEnviar">
                    <button name="Cancelar" class="formButton" type="submit" value="Cancelar" id="Cancelar" onclick="window.history.go(-1); return false;">Cancelar</button>
                </div>               
            </form>
        </div>               
    </body>

</html>