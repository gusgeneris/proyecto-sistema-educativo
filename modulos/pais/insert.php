<?php
    require_once '../../class/MySql.php'; 
    require_once "../../configs.php";  
    require_once "../../class/Pais.php";
    
    $mensaje='';
    
    if(isset($_GET['mj'])){
        $mj=$_GET['mj'];
        if ($mj==CORRECT_INSERT_CODE){
            $mensaje=CORRECT_INSERT_MENSAJE;?>
            <div class="mensajes"><?php echo $mensaje;?></div><?php
        }
    };
    
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
    <link rel="stylesheet" href="../../style/mensaje.css">
    <script src="../../jquery3.6.js"></script>
    <script type="text/javascript" src="../../script/menu.js" defer> </script>
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Aregar Pais</title>
    <title>Insert</title>
</head>

    <?php require_once "../../menu.php";
    require_once "../../mensaje.php";?>



<body class="body">

    <div class="titulo">
        <h1> Registro de Pais</h1>
    </div>

    <div class="main">
    <form action="procesador_insert.php"  method="POST" class="formInsertUnaColumna" id="formInsert" name="formInsert">
            
            

            <div class="formGrup" id="GrupoProvincia">
            
                <label for="Provincia" class="formLabel">Nombre Pais</label>    
                <div class="formGrupInput">
                    <input type="text" name="Provincia" class="formInput" placeholder="Nombre Pais">
                </div>
                <p class="formularioInputError"> Los datos ingresados son incorrectos.</p> 
            </div> 


            <!--Grupo de Mensaje-->
                
            <div class="formMensaje" id="GrupoMensaje">
                    
                <p class="MensajeError"> <b>Error</b>: Complete correctamente el Formulario </p>
            
            </div>

            <!--Grupo de Boton Enviar-->

            <div class="formGrupBtnEnviarUnaColumna">
                <button type="submit" class="formButton" id='Guardar' value='FormInsertProvincia'> Guardar</button>
            
                <button name="Cancelar" class="formButton" type="submit" value="Cancelar" id="Cancelar" onclick="window.history.go(-1); return false;">Cancelar</button>
            </div>
        </form>
    </div>
    <?php require_once "../../footer.php"?>  
        
    <script type="text/javascript" src="../../script/validacionFormInsert.js"></script>
    
</body>

</html>