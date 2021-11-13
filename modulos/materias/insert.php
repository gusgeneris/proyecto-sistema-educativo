<?php
require_once "../../class/MySql.php";
require_once "../../class/Materia.php";    
require_once "../../configs.php";  


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
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Agregar Materia</title>
    <title>Agregar nuevo</title>
</head>

<?php require_once "../../menu.php";?>

<body>
    <div class="titulo">    
        <h1> Registro de Materia</h1>
    </div>


    <div class="main">
        <form action="procesar_insert.php" method="POST" class="formInsertUnaColumna" id="formInsert" name="formInsert">
            
            <div class="formGrup" id="GrupoNombreMateria" >
                <label for="NombreMateria" class="formLabel">Materia Nombre</label>
                <div class="formGrupInput">
                    <input type="text" id='NombreMateria' name="NombreMateria" class="formInput" placeholder="Materia Nombre">
                </div>
                <p class="formularioInputError"> Los datos ingresados no son correctos.</p>
            </div>
            
            <!--Grupo de Mensaje-->
                
            <div class="formMensaje" id="GrupoMensaje">
                    
                <p class="MensajeError"> <b>Error</b>: Complete correctamente el Formulario </p>
                
            </div>
        
            <!--Grupo de Boton Enviar-->
        
            <div class="formGrupBtnEnviar3Columnas">
                <button type="submit" class="formButton" value ="FormInsertMateria" id="Guardar"> Guardar</button>
            
                <button name="Cancelar" class="formButton" type="button" value="Cancelar" id="Cancelar" onclick="window.history.go(-1); return false">Cancelar</button>
            </div>
        </form>
    </div>
    <?php require_once "../../footer.php"?> 
    
</body>


<script type="text/javascript" src="../../script/validacionFormInsert.js"></script>
</html>