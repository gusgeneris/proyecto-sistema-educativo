<?php
require_once "../../class/PeriodoDesarrollo.php";
require_once "../../configs.php";

if(isset($_GET['id'])){
    $id=$_GET['id'];    
}

$periodoDesarrollo= PeriodoDesarrollo::obtenerTodoPorId($id);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/styleFormInsert.css">
    <link rel="stylesheet" href="/proyecto-modulos/style/menu.css" class="">
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Modificar Ciclo Lectivo</title>
</head>
<?php require_once "../../menu.php";?>

<body class="modif-user">
    <h1 class="titulo">Ingrese el nuevo dato</h1>

    <form action="procesar_actualizar.php" method=POST class="formInsertUnaColumna" id="formModificar" name="formInsert">
        
        <div class=""> 
                <input name="idPeriodoDesarrollo" type="hidden" class="" value="<?php echo $periodoDesarrollo->getIdPeriodoDesarrollo(); ?>">
            </div>
            <div class="formGrup" id="GrupoDetallePeriodo" > 
                <label for="DetallePeriodo" class="formLabel">Detalle Año de Desarrollo</label> 
                
                <div class="formGrupInput">
                    <input name="DetallePeriodo" type="text" class="formInput" id="DetallePeriodo" value="<?php echo $periodoDesarrollo->getDetallePeriodo(); ?>">
                </div>
                <p class="formularioInputError"> La fecha de nacimiento no es necesariamente obligatoria.</p>         
            </div>

        <!--Grupo de Mensaje-->
            
        <div class="formMensaje" id="GrupoMensaje">
                
            <p class="MensajeError"> <b>Error</b>: Complete correctamente el Formulario </p>
        
        </div>

        <!--Grupo de Boton Enviar-->

        <div class="formGrupBtnEnviar">
            <button type="submit" class="formButton" id='Guardar' value='FormInsertPeriodoDesarrollo'> Guardar</button>
        </div>
        <br>
        <div class="formGrupBtnEnviar">
            <button name="Cancelar" class="formButton" type="submit" value="Cancelar" id="cancelar" onclick="window.history.go(-1); return false;">Cancelar</button>
        </div>
    </form>
    
</body>
<script type="text/javascript" src="../../script/validacionFormModificar.js"></script>
</html>