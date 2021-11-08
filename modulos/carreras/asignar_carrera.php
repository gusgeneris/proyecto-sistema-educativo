<?php
    require_once '../../class/CicloLectivo.php';
    require_once '../../class/Materia.php';
    require_once '../../class/Carrera.php';
    require_once '../../class/MySql.php'; 
    require_once "../../configs.php";  
    require_once "../../mensaje.php"; 

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
        <link rel="stylesheet" href="../../style/styleFormInsert.css">
    <link href="../../icon/fontawesome/css/all.css" rel="stylesheet"> <!--Estilos para iconos -->
    <link rel="stylesheet" href="../../style/menuVertical.css">
    <script src="../../jquery3.6.js"></script>
    <script type="text/javascript" src="../../script/menu.js" defer> </script>
        <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Asigar Carrera</title>
        <title>Asignar</title>
    </head>



    <body class="body">

    <?php require_once "../../menu.php";?>
        
    <div class="titulo">   
        <h1> Asignar Carrera al Ciclo Lectivo: <?php echo $cicloLectivo ?></h1>
    </div>

        <div class="main">

            <form action="procesar_asignar.php" method=POST class="formulario">

                <div><input type="hidden" name=IdCiclo value=<?php echo $idCicloLectivo  ?>></div>

                <div class="formGrup" id="GrupocboCarrera">
                    <label for="cboCarrera" class="formLabel ">Carrera</label>
                    <div class="formGrupInput">
                        <select name="Carrera" id="" class="">
                            <option value="NULL" class="">Asigne Carrera</option>
                            <?php foreach($listado as $carrera):?>
                            <option value="<?php echo $carrera->getIdCarrera(); ?>" class=""><?php echo $carrera?></option>
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
    <?php require_once "../../footer.php"?>                            
    </body>

</html>