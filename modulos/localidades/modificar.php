<?php

require_once "../../class/Localidad.php";
require_once "../../configs.php";

if(isset($_GET['id'])){
    $id=$_GET['id'];    
}

$idLocalidad = $_GET['idLocalidad'];
$idProvincia=$_GET["idProvincia"];

$localidad= Localidad::obtenerPorIdLocalidad($idLocalidad);


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../style/styleFormInsert.css">
        <link rel="stylesheet" href="/proyecto-modulos/style/menu.css" class="">
        <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Modificar Localidad</title>
    </head>
    <?php require_once "../../menu.php";?>

    <body class="modif-user">
        <h1 class="titulo">Ingrese los nuevos datos</h1>
        <form action="procesar_actualizar.php" method="POST"  class="formUnaColumna" name="formModificar" id="formModificar">
                

                <div class=""> 
                    <input name="IdProvincia" type="hidden" class="" value="<?php echo $localidad->getIdProvincia(); ?>">
                </div>
                <div class=""> 
                    <input name="IdLocalidad" type="hidden" class="" value="<?php echo $localidad->getIdLocalidad(); ?>">
                </div>

                <div class="formGrup" id="GrupoLocalidad" >
                    <label for="Localidad" class="formLabel">Nombre</label>
                    <div class="formGrupInput">
                        <input name="Localidad" type="text" class="formInput" value="<?php echo $localidad->getNombre(); ?>">
                    </div>
                    <p class="formularioInputError"> El nombre no debe contener numeros ni simbolos.</p>
                </div>


                <!--Grupo de Mensaje-->
                
                <div class="formMensaje" id="GrupoMensaje">
                    
                    <p class="MensajeError"> <b>Error</b>: Complete correctamente el Formulario </p>
                
                </div>

                <div> 
                <div class="formGrupBtnEnviar">
                    <button type="submit" class="formButton" value ="FormInsertLocalidad" id="Guardar"> Guardar</button>
                </div>

                <div class="formGrupBtnEnviar">
                    <button name="Cancelar" class="formButton" type="submit" value="Cancelar" id="Cancelar" onclick="window.history.go(-1); return false" >Cancelar</button>
                </div>
    </form>

</body>


<script type="text/javascript" src="../../script/validacionFormModificar.js"></script>



</html>