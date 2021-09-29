<?php
require_once "../../class/CicloLectivo.php";
require_once "../../configs.php";

if(isset($_GET['id'])){
    $id=$_GET['id'];    
}

$CicloLectivo= CicloLectivo::obtenerTodoPorId($id);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/styleFormInsert.css">
    <link rel="stylesheet" href="/proyecto-modulos/style/menu.css" class="">
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Modificar Ciclo Lectivo</title>
</head>
<?php require_once "../../menu.php";?>

<body class="modif-user">
    <h1 class="titulo">Ingrese el nuevo dato</h1>

    <form action="procesar_actualizar.php" method=POST class="formInsertUnaColumna" id="formModificar" name="formInsert">
        
        <div class=""> 
                <input name="idCicloLectivo" type="hidden" class="" value="<?php echo $CicloLectivo->getIdCicloLectivo(); ?>">
        </div>
        
        <div class="formGrup" id="GrupoCicloLectivo" > 
            <label for="CicloLectivo" class="formLabel">Año</label> 
            
            <div class="formGrupInput">
                <input name="CicloLectivo" type="text" class="formInput" id="CicloLectivo" value="<?php echo $CicloLectivo->getAnio(); ?>">
            </div>
            <p class="formularioInputError"> La fecha de nacimiento no es necesariamente obligatoria.</p>         
        </div>

        <!--Grupo de Mensaje-->
            
        <div class="formMensaje" id="GrupoMensaje">
                
            <p class="MensajeError"> <b>Error</b>: Complete correctamente el Formulario </p>
        
        </div>

        <!--Grupo de Boton Enviar-->

        <div class="formGrupBtnEnviar">
            <button type="submit" class="formButton" id='Guardar' value='FormInsertCicloLectivo'> Guardar</button>
        </div>
        <br>
        <div class="formGrupBtnEnviar">
            <button name="Cancelar" class="formButton" type="submit" value="Cancelar" id="cancelar" onclick="window.history.go(-1); return false;">Cancelar</button>
        </div>
    </form>
    
</body>
<script type="text/javascript" src="../../script/validacionFormModificar.js"></script>
</html>