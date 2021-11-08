<?php
require_once "../../class/Especialidad.php";
require_once "../../configs.php";
require_once "../../mensaje.php";

$id=$_GET['id'];

$especialidad= Especialidad::obtenerPorId($id);

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
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Modificar Eje Contenido</title>
</head>
<?php require_once "../../menu.php";?>

<body class="modif-user">
    
    <h1 class="titulo">Ingrese los nuevos datos</h1>

    <form action="procesar_actualizar.php" method=POST class="formInsertUnaColumna" id="formModificar" name="formModificar">
    
        <table>
            
            <input name="IdEspecialidad" type="hidden" class="" value="<?php echo $especialidad->getIdEspecialidad(); ?>">
            
            <div class="formGrup" id="GrupoEspecialidad" >
            <label for="Esecialidad" class="formLabel">Especialidad</label>
            <div class="formGrupInput">
                <input type="text" name="Especialidad" id="Especialidad" class="formInput" value="<?php echo $especialidad->getDescripcion(); ?>">
                <p class="formularioInputError"> El nombre no debe contener numeros ni simbolos.</p>
            </div>
        </div>

        <!--Grupo de Mensaje-->
            
        <div class="formMensaje" id="GrupoMensaje">
                
            <p class="MensajeError"> <b>Error</b>: Complete correctamente el Formulario </p>
            
        </div>
    
        <!--Grupo de Boton Enviar-->
    
        <div class="formGrupBtnEnviar">
            <button type="submit" class="formButton" value ="FormInsertEspecialidad" id="Guardar"> Guardar</button>
        </div>
    
        <div class="formGrupBtnEnviar">
            <button name="Cancelar" class="formButton" type="submit" value="Cancelar" id="Cancelar" onclick="window.history.go(-1); return false">Cancelar</button>
        </div>
    </form>
    <?php require_once "../../footer.php"?>      
</body>


<script type="text/javascript" src="../../script/validacionFormModificar.js"></script>

    
</body>
</html>