<?php
    require_once "../../class/Carrera.php";
    require_once "../../configs.php";

    $idCarrera=$_GET["id"];
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
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Modificar Carrera</title>
</head>

    <?php require_once "../../menu.php";?>
    <br>

<body>
    <h1 class="titulo">Ingrese los nuevos datos</h1>

    <form action="procesar_actualizar.php" method="post" class="formModificar">
        

        <input name="IdCarrera" type="hidden" value="<?php echo $carrera->getIdCarrera();?>">

        <div class="formGrup" id="GrupoNombre" >
            <label for="Nombre" class="formLabel">Nombre</label>
            <div class="formGrupInput">
                <input type="text" id='Nombre' name="Nombre" class="formInput" value="<?php echo $carrera->getNombre();?>">
            </div>
            <p class="formularioInputError"> El nombre no debe contener numeros ni simbolos.</p>
        </div>

        <div class="formGrup" id="GrupoAnios" >
            <label for="Anios" class="formLabel">Años de duracion</label>
            <div class="formGrupInput">
                <input type="text" id='Anios' name="Anios" class="formInput" value="<?php echo $carrera->getDuracionAnios();?>">
            </div>
            <p class="formularioInputError"> El nombre no debe contener numeros ni simbolos.</p>
        </div>


            <!--Grupo de Mensaje-->
                
            <div class="formMensaje" id="GrupoMensaje">
                    
                    <p class="MensajeError"> <b>Error</b>: Complete correctamente el Formulario </p>
                
                </div>

                <div> 
                <div class="formGrupBtnEnviar">
                    <button type="submit" class="formButton" value ="FormInsertCarrera" id="Guardar"> Guardar</button>
                </div>

                <div class="formGrupBtnEnviar">
                    <button name="Cancelar" class="formButton" type="submit" value="Cancelar" id="Cancelar onclick="window.history.go(-1); return false" >Cancelar</button>
                </div>
    </form>

</body>


<script type="text/javascript" src="../../script/validacionFormModificar.js"></script>
</html>