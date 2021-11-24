<?php
    require_once '../../class/MySql.php'; 
    require_once "../../class/Especialidad.php";

?>

<!DOCTYPE html>
<html lang="es">

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
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Agregar Especialidad</title>
    <title>Insertar</title>
</head>

<?php require_once "../../menu.php";
    require_once "../../mensaje.php";?>

<body class="body">
    
    <div class="titulo">
        <h1> Registro de Especialidad</h1>
    </div>
    <div class="main">
        <form action="procesar_insert.php" method=POST class="formInsertUnaColumna" id="formInsert" name="formInsert">
            
            <div class="formGrup" id="GrupoModulo" >
                <label for="Modulo" class="formLabel">Nombre del Modulo</label>
                <div class="formGrupInput">
                    <input type="text" name="Modulo" id="Modulo" class="formInput" placeholder="Descripcion">
                    <p class="formularioInputError"> El nombre no debe contener simbolos.</p>
                </div>
            </div>

            <!--Grupo de Mensaje-->
                
            <div class="formMensaje" id="GrupoMensaje">
                    
                <p class="MensajeError"> <b>Error</b>: Complete correctamente el Formulario </p>
                
            </div>
        
            <!--Grupo de Boton Enviar-->
        
            <div class="formGrupBtnEnviarDosColumnas">
                <button type="submit" class="formButton" value ="FormInsertModulo" id="Guardar"> Guardar</button>
                <button name="Cancelar" class="formButton" type="submit" value="Cancelar" id="Cancelar" onclick="window.history.go(-1); return false">Cancelar</button>
            </div>
        </form>
    </div>
    <?php require_once "../../footer.php"?>   
    
</body>


<script type="text/javascript" src="../../script/validacionFormInsert.js"></script>

</html>