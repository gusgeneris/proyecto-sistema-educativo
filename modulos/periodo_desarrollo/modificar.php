<?php
require_once "../../class/PeriodoDesarrollo.php";
require_once "../../configs.php";
require_once "../../mensaje.php";

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
    <link href="../../icon/fontawesome/css/all.css" rel="stylesheet"> <!--Estilos para iconos -->
    <link rel="stylesheet" href="../../style/menuVertical.css">
    <script src="../../jquery3.6.js"></script>
    <script type="text/javascript" src="../../script/menu.js" defer> </script>
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Modificar Ciclo Lectivo</title>
</head>
<?php require_once "../../menu.php";?>

<body class="modif-user">
    <div class="titulo">    
        <h1>Ingrese el nuevo dato</h1class=>
    </div>

    <div class="main">
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

            <div class="formGrupBtnEnviarUnaColumna">
                <button type="submit" class="formButton" id='Guardar' value='FormInsertPeriodoDesarrollo'> Guardar</button>
                <button name="Cancelar" class="formButton" type="button" value="Cancelar" id="Cancelar" onclick="window.history.go(-1); return false;">Cancelar</button>
            </div>
        </form>
    </div>
    <?php require_once "../../footer.php"?> 
</body>
<script type="text/javascript" src="../../script/validacionFormModificar.js"></script>
</html>