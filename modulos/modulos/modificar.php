<?php
require_once "../../class/Modulo.php";
require_once "../../configs.php";
require_once "../../mensaje.php";

$idModulo=$_GET['idModulo'];
$moduloPorId= Modulo::obtenerPorId($idModulo);

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
    
    <div class="titulo">
        <h1>Ingrese los nuevos datos</h1>
    </div>

    <div class="main">
        <form action="procesar_actualizar.php" method=POST class="formInsertUnaColumna" id="formModificar" name="formModificar">
        
                
                <input name="IdModulo" type="hidden" class="" value="<?php echo $moduloPorId->getIdModulo(); ?>">
                
            <div class="formGrup" id="GrupoModulo" >
                <label for="Modulo" class="formLabel">Nombre del Modulo</label>
                <div class="formGrupInput">
                    <input type="text" name="Modulo" id="Modulo" class="formInput" value="<?php echo $moduloPorId->getNombre(); ?>">
                    <p class="formularioInputError"> El nombre no debe contener numeros ni simbolos.</p>
                </div>
            </div>

            <!--Grupo de Mensaje-->
                
            <div class="formMensaje" id="GrupoMensaje">
                    
                <p class="MensajeError"> <b>Error</b>: Complete correctamente el Formulario </p>
                
            </div>
        
            <!--Grupo de Boton Enviar-->
        
            <div class="formGrupBtnEnviarDosColumnas">
                <button type="submit" class="formButton" value ="FormInsertModulo" id="Guardar"> Guardar</button>
                <button name="Cancelar" class="formButton" type="button" value="Cancelar" id="Cancelar" onclick="window.history.go(-1); return false">Cancelar</button>
            </div>
        </form>
    </div>

    <?php require_once "../../footer.php"?>   
    
</body>


<script type="text/javascript" src="../../script/validacionFormModificar.js"></script>

    
</body>
</html>