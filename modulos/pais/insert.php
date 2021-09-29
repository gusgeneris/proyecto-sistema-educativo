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
    <link rel="stylesheet" href="/proyecto-modulos/style/menu.css" class="">
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Aregar Pais</title>
    <title>Insert</title>
</head>

<?php require_once "../../menu.php";?>



<body class="body">

    <h1 class="titulo"> Registro de Pais</h1>

    <form action="procesador_insert.php" method="POST"  class="formInsertUnaColumna" id="formInsert" name="formInsert">
        
        <div class="formGrup" id="GrupoPais">
                
            <label for="Pais" class="formLabel">Nombre Pais</label>    
            <div class="formGrupInput">
                <input  type="text" name="Pais" class="formInput" placeholder="Nombre Pais"></div>
            </div>
            <p class="formularioInputError"> El Nombre de Pais no permite simbolos ni numeros.</p> 
        </div>

            <!--Grupo de Mensaje-->
            
            <div class="formMensaje" id="GrupoMensaje">
                
                <p class="MensajeError"> <b>Error</b>: Complete correctamente el Formulario </p>
            
            </div>
    
            <!--Grupo de Boton Enviar-->
    
            <div class="formGrupBtnEnviar">
                <button type="submit" class="formButton" id='Guardar' value='FormInsertPais'> Guardar</button>
            </div>
            <br>
            <div class="formGrupBtnEnviar">
                <button name="Cancelar" class="formButton" type="submit" value="Cancelar" id="cancelar" onclick="window.history.go(-1); return false;">Cancelar</button>
            </div>
        </form>
    
    </body>
    
    <script type="text/javascript" src="../../script/validacionFormInsert.js"></script>
    
</body>

</html>