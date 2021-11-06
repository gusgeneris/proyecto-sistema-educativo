<?php
    require_once '../../class/MySql.php'; 
    require_once "../../class/Especialidad.php";
    
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
    <link rel="stylesheet" href="/proyecto-modulos/style/menu.css" class="">
    <link href="../../icon/fontawesome/css/all.css" rel="stylesheet"> <!--Estilos para iconos -->
    <link rel="stylesheet" href="../../style/menuVertical.css">
    <script src="../../jquery3.6.js"></script>
    <script type="text/javascript" src="../../script/menu.js" defer> </script>
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Agregar Especialidad</title>
    <title>Insertar</title>
</head>

<?php require_once "../../menu.php";?>

<body class="body">
    
    <h1 class="titulo"> Registro de Especialidad</h1>
    <form action="procesar_insert.php" method=POST class="formInsertUnaColumna" id="formInsert" name="formInser">
        
        <div class="formGrup" id="GrupoEspecialidad" >
            <label for="Esecialidad" class="formLabel">Especialidad Nombre</label>
            <div class="formGrupInput">
                <input type="text" name="Especialidad" id="Especialidad" class="formInput" placeholder="Descripcion">
                <p class="formularioInputError"> El nombre no debe contener simbolos.</p>
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
    
</body>


<script type="text/javascript" src="../../script/validacionFormInsert.js"></script>

</html>