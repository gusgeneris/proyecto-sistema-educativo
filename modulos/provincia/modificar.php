<?php

require_once "../../class/Provincia.php";
require_once "../../configs.php";
require_once "../../mensaje.php";

if(isset($_GET['id'])){
    $id=$_GET['id'];    
}

$idPais = $_GET['idPais'];
$idProvincia=$_GET["idProvincia"];

$provincia= Provincia::obtenerPorIdProvincia($idProvincia);


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
        <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Modificar Provincia</title>
    </head>
    <?php require_once "../../menu.php";?>

    <body class="modif-user">
        <div class="titulo">
            <h1>Ingrese los nuevos datos</h1>
        </div>
        <div class="main">
            <form action="procesar_actualizar.php" method="POST"  class="formUnaColumna" name="formModificar" id="formModificar">

                <input name="IdPais" type="hidden" class="" value="<?php echo $provincia->getIdPais(); ?>">
                
                
                <input name="IdProvincia" type="hidden" class="" value="<?php echo $provincia->getIdProvincia(); ?>">
                
                <div class="formGrup" id="GrupoProvincia" >
                    <label for="Provincia" class="formLabel">Nombre Provincia</label>
                    <div class="formGrupInput"> 
                        <input name="Provincia" type="text" class="formInput" value="<?php echo $provincia->getNombre(); ?>">
                    </div>
                    <p class="formularioInputError"> El nombre no debe contener numeros ni simbolos.</p>
                </div>

                <!--Grupo de Mensaje-->
                
                <div class="formMensaje" id="GrupoMensaje">
                    
                    <p class="MensajeError"> <b>Error</b>: Complete correctamente el Formulario </p>
                
                </div>

                <div> 
                <div class="formGrupBtnEnviar">
                    <button type="submit" class="formButton" value ="FormInsertProvincia" id="Guardar"> Guardar</button>
                </div>

                <div class="formGrupBtnEnviar">
                    <button name="Cancelar" class="formButton" type="submit" value="Cancelar" id="Cancelar" onclick="window.history.go(-1); return false" >Cancelar</button>
                </div>
        </form>
    </div>
    <?php require_once "../../footer.php"?>     

</body>


<script type="text/javascript" src="../../script/validacionFormModificar.js"></script>

</html>