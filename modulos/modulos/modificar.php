<?php
require_once "../../class/Modulo.php";
require_once "../../configs.php";
$idModulo=$_GET['idModulo'];

$modulo= Modulo::obtenerPorId($idModulo);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/styleFormInsert.css">
    <link rel="stylesheet" href="/proyecto-modulos/style/menu.css" class="">
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Modificar Eje Contenido</title>
</head>
<?php require_once "../../menu.php";?>

<body class="modif-user">
    
    <h1 class="titulo">Ingrese los nuevos datos</h1>

    <form action="procesar_actualizar.php" method=POST class="formInsertUnaColumna" id="" name="formModificar">
    
        <table>
            
            <input name="IdModulo" type="hidden" class="" value="<?php echo $modulo->getIdModulo(); ?>">
            
            <div class="formGrup" id="Grupomodulo" >
            <label for="Modulo" class="formLabel">Nombre del Modulo</label>
            <div class="formGrupInput">
                <input type="text" name="Modulo" id="modulo" class="formInput" value="<?php echo $modulo->getNombre(); ?>">
                <p class="formularioInputError"> El nombre no debe contener numeros ni simbolos.</p>
            </div>
        </div>

        <!--Grupo de Mensaje-->
            
        <div class="formMensaje" id="GrupoMensaje">
                
            <p class="MensajeError"> <b>Error</b>: Complete correctamente el Formulario </p>
            
        </div>
    
        <!--Grupo de Boton Enviar-->
    
        <div class="formGrupBtnEnviar">
            <button type="submit" class="formButton" value ="FormInsertModulo" id="Guardar"> Guardar</button>
        </div>
    
        <div class="formGrupBtnEnviar">
            <button name="Cancelar" class="formButton" type="submit" value="Cancelar" id="Cancelar" onclick="window.history.go(-1); return false">Cancelar</button>
        </div>
    </form>
    
</body>


<script type="text/javascript" src="../../script/validacionFormModificar.js"></script>

    
</body>
</html>