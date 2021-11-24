<?php
    require_once '../../class/MySql.php'; 
    require_once "../../class/AnioDesarrollo.php";
    require_once "../../mensaje.php";

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
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Agregar Ciclo Lectivo</title>
    <title>Insertar Nuevo</title>
</head>

<?php require_once "../../menu.php";?>

<body class="body">

    <div class="titulo">
        <h1> Registro de Ciclo Lectivo</h1>
    </div>

    <div class="main">
    <form action="procesar_insert.php" method=POST class="formInsertUnaColumna" id="formInsert" name="formInsert">
    
       
        <div class="formGrup" id="GrupoDetalleAnio">
        
        <label for="DetalleAnio" class="formLabel">Año de Desarrollo</label>    
            <div class="formGrupInput">
                <input autofocus type="text"  id="DetalleAnio" name="DetalleAnio" class="formInput" placeholder="Año de Desarrollo" >
                <i ><img class="formValidacionEstado"  src="" id="formValidacionEst"></i>
            </div> 
            <p class="formularioInputError"> El NumeroLegajo no es necesariamente obligatoria.</p> 
        </div> 

        <!--Grupo de Mensaje-->
            
        <div class="formMensaje" id="GrupoMensaje">
                
            <p class="MensajeError"> <b>Error</b>: Complete correctamente el Formulario </p>
        
        </div>

        <!--Grupo de Boton Enviar-->

        <div class="formGrupBtnEnviarUnaColumna">
            <button type="submit" class="formButton" id='Guardar' value='FormInsertAnioDesarrollo'> Guardar</button>
        
            <button name="Cancelar" class="formButton" type="button" value="Cancelar" id="Cancelar" onclick="window.history.go(-1); return false;">Cancelar</button>
        </div>
    </form>
    </div>
    
    <?php require_once "../../footer.php"?>   
</body>

<script type="text/javascript" src="../../script/validacionFormInsert.js"></script>

</html>