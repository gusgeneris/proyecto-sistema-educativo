<?php
    require_once "../../class/Materia.php";
    require_once "../../configs.php";
    require_once "../../mensaje.php";

    $idMateria=$_GET["id"];
    $materia=Materia::listadoPorId($idMateria);
    $nombreMateria=$materia->getNombre();
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
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Modificar Materia</title>
</head>

    <?php require_once "../../menu.php";?>

<body>
<div class="titulo">
    <h1>Ingrese los nuevos datos</h1>
</div>

<div class="main">
    <form action="procesar_actualizar.php" method="POST" class="formModificarUnaColumna" id="formModificar" name="formModificar">

        
        <input name="idMateria" type="hidden" value="<?php echo $materia->getIdMateria();?>">
        
        <div class="formGrup" id="GrupoNombreMateria" >
                <label for="NombreMateria" class="formLabel">Nombre Materia</label>
            <div class="formGrupInput">
                <input name="NombreMateria"class="formInput" type="text"  value="<?php echo $nombreMateria;?>">
            </div>
            <p class="formularioInputError"> El nombre no debe contener simbolos.</p>
        </div>


        <!--Grupo de Mensaje-->
                    
        <div class="formMensaje" id="GrupoMensaje">
                        
            <p class="MensajeError"> <b>Error</b>: Complete correctamente el Formulario </p>
                    
        </div>

                
        <div class="formGrupBtnEnviar3Columnas">
            <button type="submit" class="formButton" value ="FormInsertMateria" id="Guardar"> Guardar</button>
        
            <button name="Cancelar" class="formButton" type="submit" value="Cancelar" id="Cancelar" onclick="window.history.go(-1); return false" >Cancelar</button>
        </div>
    </form>
</div>
<?php require_once "../../footer.php"?> 

</body>


<script type="text/javascript" src="../../script/validacionFormModificar.js"></script>
</html>