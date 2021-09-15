<?php
require_once "../../class/MySql.php";
require_once "../../class/Materia.php";    
require_once "../../configs.php";  

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
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Agregar Materia</title>
    <title>Agregar nuevo</title>
</head>

<?php require_once "../../menu.php";?>

<body>
    
    <h1 class="titulo"> Registro de Materia</h1>

    <form action="procesar_insert.php" method="POST" class="formInsertUnaColumna" id="formInsert" name="formInsert">
        
        <div class="formGrup" id="GrupoNombreMateria" >
            <label for="NombreMateria" class="formLabel">Materia Nombre</label>
            <div class="formGrupInput">
                <input type="text" id='NombreMateria' name="NombreMateria" class="formInput" placeholder="Materia Nombre">
            </div>
            <p class="formularioInputError"> El nombre no debe contener numeros ni simbolos.</p>
        </div>
        
        <!--Grupo de Mensaje-->
            
        <div class="formMensaje" id="GrupoMensaje">
                
            <p class="MensajeError"> <b>Error</b>: Complete correctamente el Formulario </p>
            
        </div>
    
        <!--Grupo de Boton Enviar-->
    
        <div class="formGrupBtnEnviar">
            <button type="submit" class="formButton" value ="FormInsertMateria" id="Guardar"> Guardar</button>
        </div>
    
        <div class="formGrupBtnEnviar">
            <button name="Cancelar" class="formButton" type="submit" value="Cancelar" id="Cancelar" onclick="window.history.go(-1); return false">Cancelar</button>
        </div>
    </form>
    
</body>


<script type="text/javascript" src="../../script/validacionFormInsert.js"></script>
</html>