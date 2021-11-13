<?php
    require_once "../../class/Carrera.php";
    require_once "../../configs.php"; 
    require_once "../../mensaje.php";

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
    <link href="../../icon/fontawesome/css/all.css" rel="stylesheet"> <!--Estilos para iconos -->
    <link rel="stylesheet" href="../../style/menuVertical.css">
    <script src="../../jquery3.6.js"></script>
    <script type="text/javascript" src="../../script/menu.js" defer> </script>
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Modificar Carrera</title>
</head>

    <?php require_once "../../menu.php";?>

<body>
    <div class="titulo">
        <h1>Ingrese los nuevos datos</h1>
    </div>

    <div class="main">
        <form action="procesar_actualizar.php" method="post" class="formModificar2Columnas" id="formModificar">
            
            <input name="IdCarrera" type="hidden" value="<?php echo $carrera->getIdCarrera();?>">

            <div class="formGrup" id="GrupoNombreCarrera" >
                <label for="Nombre" class="formLabel">Nombre</label>
                <div class="formGrupInput">
                    <input type="text" id='Nombre' name="NombreCarrera" class="formInput" value="<?php echo $carrera->getNombre();?>">
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

            <div class="formGrupBtnEnviar">
                <button type="submit" class="formButton" value ="FormInsertCarrera" id="Guardar"> Guardar</button>
           
                <button name="Cancelar" class="formButton" type="button" value="Cancelar" id="Cancelar" onclick="window.history.go(-1); return false" >Cancelar</button>
            </div>
        </form>
    </div>
    <?php require_once "../../footer.php"?>   
</body>


<script type="text/javascript" src="../../script/validacionFormModificar.js"></script>
</html>