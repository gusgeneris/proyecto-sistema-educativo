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
        <link href="../../icon/fontawesome/css/all.css" rel="stylesheet"> <!--Estilos para iconos -->
        <link rel="stylesheet" href="../../style/menuVertical.css">
        <link rel="stylesheet" href="../../style/mensaje.css">
        <script src="../../jquery3.6.js"></script>
        <script type="text/javascript" src="../../script/menu.js" defer> </script>
        <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Asigar Docente</title>
        <title>Asignar</title>
    </head>


    <body class="body">

        <?php
            require_once "../../mensaje.php";  require_once "../../menu.php";
        ?>

        <div class="titulo">
            <h1> Asignar Docente a la Materia: <?php echo $materia ?> / <?php echo $carrera ?> </h1>
        </div>
        
        <div class="main">
            <form action="procesar_asignar.php" method=POST class="formulario"  id="formInsert" name="formInsert">
                
                <div><input type="hidden" name=IdCarrera value=<?php echo $idCarrera  ?>></div>
                <div><input type="hidden" name=IdMateria value=<?php echo $idMateria  ?>></div>
                <div><input type="hidden" name=IdCicloLectivo value=<?php echo $idCicloLectivo  ?>></div>

                <div class="formGrup" id="GrupocboDocente">
                    <label for="cboDocente" class="formLabel ">Docente</label>
                    <div class="formGrupInput">
                        <select name="cboDocente" id="cboDocente" class="formInput">
                            <option value="NULL" class="">Asigne al Docente</option>
                            <?php foreach($listado as $docente):?>
                            <option value="<?php echo $docente->getIdDocente(); ?>" class=""><?php echo $docente." | Dni:"; echo $docente->getDni() ?></option>
                            <?php endforeach?>
                        </select>
                    </div>
                    <p class="formularioInputError"> Debe seleccionar una opcion </p> 
                </div>

                <div class="formGrupBtnEnviarUnaColumna">
                    <button type="submit" class="formButton" value ="FormInsertAsignarDocente" id="Guardar"> Guardar</button>
               
                    <button name="Cancelar" class="formButton" type="button" value="Cancelar" id="Cancelar" onclick="window.history.go(-1); return false;">Cancelar</button>
                </div>               
            </form>
        </div>  
        <?php require_once "../../footer.php"?>             
    </body>

    <script type="text/javascript" src="../../script/validacionFormInsert.js"></script>
</html>