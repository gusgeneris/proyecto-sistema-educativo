<?php
    require_once '../../class/MySql.php'; 
    require_once "../../configs.php";  
    

    $idLocalidad=$_GET['idLocalidad'];
    $idProvincia=$_GET['idProvincia'];
    $idPais=$_GET['idPais'];
?>

<!DOCTYPE html>
<html lang="eS">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../style/styleFormInsert.css">
        <link href="../../icon/fontawesome/css/all.css" rel="stylesheet"> <!--Estilos para iconos -->
        <link rel="stylesheet" href="../../style/menuVertical.css">
        <script src="../../jquery3.6.js"></script>
        <script type="text/javascript" src="../../script/menu.js" defer> </script>
        <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Aregar Domicilio</title>
        <title>Insert</title>
    </head>

    <?php require_once "../../menu.php";?>

    <body class="body">
        <div class="titulo">
            <h1> Registro de Barrio</h1>
        </div>

        <div class="main">
            <form action="procesador_insert.php" method=POST class="formInsertUnaColumna" id="formInsert" name="formInsert">
                
                <input type="hidden" name="IdLocalidad" class="" value="<?php echo $idLocalidad ?>">
                <input type="hidden" name="IdProvinca" class="" value="<?php echo $idProvincia ?>">
                <input type="hidden" name="IdPais" class="" value="<?php echo $idPais ?>">

                <div class="formGrup" id="GrupoBarrio">
                
                    <label for="NombreBarrio" class="formLabel">Barrio</label>    
                    <div class="formGrupInput">
                        <input type="text" name="Barrio" class="formInput" placeholder=" Nombre Barrio">
                    </div>
                    <p class="formularioInputError"> El Nombre de Barrio no permite simbolos ni numeros.</p> 
                </div> 


                
                <!--Grupo de Mensaje-->
                    
                <div class="formMensaje" id="GrupoMensaje">
                        
                    <p class="MensajeError"> <b>Error</b>: Complete correctamente el Formulario </p>
                
                </div>

                <!--Grupo de Boton Enviar-->

                <div class="formGrupBtnEnviarUnaColumna">
                    <button type="submit" class="formButton" id='Guardar' value='FormInsertBarrio'> Guardar</button>
               
                    <button name="Cancelar" class="formButton" type="submit" value="Cancelar" id="Cancelar" onclick="window.history.go(-1); return false;">Cancelar</button>
                </div>
            </form>
        </div>
        
        <?php require_once "../../footer.php"?>   
    </body>

    <script type="text/javascript" src="../../script/validacionFormInsert.js"></script>



</html>