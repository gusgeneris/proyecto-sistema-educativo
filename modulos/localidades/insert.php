<?php
    require_once '../../class/MySql.php'; 
    require_once "../../configs.php";  
    require_once "../../class/Localidad.php";
    require_once "../../mensaje.php";

    $idProvincia= $_GET['idProvincia'];
    
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
        <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Aregar Provincia</title>
        <title>Insert</title>
    </head>

    <?php require_once "../../menu.php";?>

    <body class="body">
        <div class="titulo">
            <h1> Registro de Localidades</h1>
        </div>
        <div class="main">
            <form action="procesador_insert.php" method=POST class="formInsertUnaColumna" id="formInsert" name="formInsert">
                
                
                <input type="hidden" name="IdProvincia" value="<?php echo $idProvincia ?>">
                
                <div class="formGrup" id="GrupoLocalidad">
                
                    <label for="Localidad" class="formLabel">Nombre Localidad</label>    
                    <div class="formGrupInput">
                        <input type="text" name="Localidad" class="formInput" placeholder="Nombre Localidad">
                    </div>
                    <p class="formularioInputError"> El Nombre de Barrio no permite simbolos ni numeros.</p> 
                </div> 

            
                    <!--Grupo de Mensaje-->
                
                    <div class="formMensaje" id="GrupoMensaje">
                    
                    <p class="MensajeError"> <b>Error</b>: Complete correctamente el Formulario </p>
                
                </div>
        
                <!--Grupo de Boton Enviar-->
        
                <div class="formGrupBtnEnviar">
                    <button type="submit" class="formButton" id='Guardar' value='FormInsertLocalidad'> Guardar</button>
                </div>
                <br>
                <div class="formGrupBtnEnviar">
                    <button name="Cancelar" class="formButton" type="submit" value="Cancelar" id="Cancelar" onclick="window.history.go(-1); return false;">Cancelar</button>
                </div>
            </form>
        </div>
        <?php require_once "../../footer.php"?> 
    
    </body>
    
    <script type="text/javascript" src="../../script/validacionFormInsert.js"></script>
    
    </body>

</html>