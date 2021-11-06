<?php
    require_once '../../class/MySql.php'; 
    require_once "../../configs.php";  
    
    $mensaje='';
    
    if(isset($_GET['mj'])){
        $mj=$_GET['mj'];
        if ($mj==CORRECT_INSERT_CODE){
            $mensaje=CORRECT_INSERT_MENSAJE;?>
            <div class="mensajes"><?php echo $mensaje;?></div><?php
        }
    };

    $idLocalidad=$_GET['idLocalidad'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/styleFormInsert.css">
    <link rel="stylesheet" href="/proyecto-modulos/style/menu.css" class="">
    <link href="../../icon/fontawesome/css/all.css" rel="stylesheet"> <!--Estilos para iconos -->
    <link rel="stylesheet" href="../../style/menuVertical.css">
    <script src="../../jquery3.6.js"></script>
    <script type="text/javascript" src="../../script/menu.js" defer> </script>
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Aregar Domicilio</title>
    <title>Insert</title>
</head>

<?php require_once "../../menu.php";?>

<body class="body">
    
    <h1 class="titulo"> Registro de Barrio</h1>


    <form action="procesador_insert.php" method=POST class="formInsertUnaColumna" id="formInsert" name="formInsert">
        
        <input type="hidden" name="IdLocalidad" class="" value="<?php echo $idLocalidad ?>">

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

        <div class="formGrupBtnEnviar">
            <button type="submit" class="formButton" id='Guardar' value='FormInsertBarrio'> Guardar</button>
        </div>
        <br>
        <div class="formGrupBtnEnviar">
            <button name="Cancelar" class="formButton" type="submit" value="Cancelar" id="cancelar" onclick="window.history.go(-1); return false;">Cancelar</button>
        </div>
    </form>

</body>

<script type="text/javascript" src="../../script/validacionFormInsert.js"></script>



</html>