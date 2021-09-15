<?php
    require_once "../../class/Materia.php";
    require_once "../../configs.php";

    $idMateria=$_GET["id"];
    $materia=Materia::listadoPorId($idMateria);
    $nombreMateria=$materia->getNombre();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/styleFormInsert.css">
    <link rel="stylesheet" href="/proyecto-modulos/style/menu.css" class="">
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Modificar Materia</title>
</head>

    <?php require_once "../../menu.php";?>

<body>

<h1 class="titulo">Ingrese los nuevos datos</h1>

<form action="procesar_actualizar.php" method="POST" class="formModificar" id="formModificar" name="formModificar">

    
    <input name="idMateria" type="hidden" value="<?php echo $materia->getIdMateria();?>">
    
    <div class="formGrup" id="GrupoNombre" >
            <label for="NombreMateria" class="formLabel">Nombre Materia</label>
        <div class="formGrupInput">
            <input name="NombreMateria"class="formInput" type="text"  value="<?php echo $nombreMateria;?>">
        </div>
        <p class="formularioInputError"> El nombre no debe contener simbolos.</p>
    </div>


    <!--Grupo de Mensaje-->
                
    <div class="formMensaje" id="GrupoMensaje">
                    
        <p class="MensajeError"> <b>Error</b>: Complete correctamente el Formulario </p>
                
    </div>

               
    <div class="formGrupBtnEnviar">
        <button type="submit" class="formButton" value ="FormInsertMateria" id="Guardar"> Guardar</button>
    </div>

    <div class="formGrupBtnEnviar">
        <button name="Cancelar" class="formButton" type="submit" value="Cancelar" id="Cancelar onclick="window.history.go(-1); return false" >Cancelar</button>
    </div>
</form>

</body>


<script type="text/javascript" src="../../script/validacionFormModificar.js"></script>
</html>