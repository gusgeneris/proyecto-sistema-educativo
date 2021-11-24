<?php 

    require_once "../../class/TipoClase.php";
    require_once "../../class/Clase.php";
    require_once "../../mensaje.php";


    $idClase=$_GET["idClase"];
    $clase=Clase::mostrarPorId($idClase);
    $listaTiposClases=TipoClase::obtenerTodos();
    $numeroClase=$clase->getNumeroClase();
    $fecha=$clase->getFechaClase();
    $idCurriculaCarrera=Clase::obtenerIdCurriculaCarreraPorIdClase($idClase);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../style/styleFormInsert.css">
        <link rel="icon" type="image/jpg" href="../../image/logo.png">
        <link href="../../icon/fontawesome/css/all.css" rel="stylesheet"> <!--Estilos para iconos -->
        <link rel="stylesheet" href="../../style/menuVertical.css">
        <script src="../../jquery3.6.js"></script>
        <script type="text/javascript" src="../../script/menu.js" defer> </script>
        <script src ="../../script/comboCarrera.js"></script>
        
        <title>Modificar Clase</title>
    </head>
    <body>
        <?php 
            require_once "../../menu.php";
        ?>
        
        <div class="main">

        <form action="procesar_modificar.php" method="POST" class="formInsertUnaColumna" id="formModificar" name="formInsert">
                         
            <div class="formGrup" id="GrupoFecha">
                <label for="Fecha" class="formLabel">Fecha de la nueva clase</label>
                <div class="formGrupInput">
                    <input type="date" id="Fecha" name="Fecha" class="formInput" value="<?php echo $fecha; ?>">
                </div>
                <p class="formularioInputError"> Error en la fecha</p>
            </div>  
            
            <div class="formGrup" id="GrupocboTipoClase">
                <label for="cboTipoClase" class="formLabel">Tipo Clase</label>
                    <div class="formGrupInput">
                        

                        <select class="formInput" name="cboTipoClase" id="cboTipoClase">
                            <?php foreach ($listaTiposClases as $tipo): ?>
                                <option <?php if($tipo->getDetalle()==$clase->getTipoClase()){echo "SELECTED";}?> value = "<?php echo $tipo->getIdTipoClase()?>">
                                    <?php echo $tipo->getDetalle()?>
                                </option>
                            <?php endforeach; ?>
                        </select>

                    </div>
                    <p class="formularioInputError"> Debe seleccionar una opcion. </p> 
            </div>

            
            <input type="hidden" name="idClase" value="<?php echo $idClase ?>">
            
            <input type="hidden" name="idCurriculaCarrera" value="<?php echo $idCurriculaCarrera ?>">
            
            <?php if(isset($_GET["id"])){
                    
                    $idSolicitario=$_GET["id"];?>
                    <input id="" type="hidden" name="idSolicitario" value="<?php echo $idSolicitario?>">
                     
            <?php switch ($idSolicitario) {
                        case '1':    
                            $idMateria=$_GET["idMateria"];?>
                            <input type="hidden" name="idMateria" value="<?php echo $idMateria ?>">
            <?php           break; ?>
            <?php       case '2'|| '3':
                            $idCurriculaCarrera=$_GET["idCurriculaCarrera"]?>
                            <input id="" type="hidden" name="idCurriculaCarrera" value="<?php echo $idCurriculaCarrera?>">       
            <?php           break;}?>


            <?php }?>

            <div class="formMensaje" id="GrupoMensaje">
                    
                <p class="MensajeError"> <b>Error</b>: Complete correctamente el Formulario </p>
            
            </div>

            <div class="formGrupBtnEnviarDosColumnas">
                <button class="formButton" id="Guardar" value ="FormInsertAlumnos" type="submit" > Modificar </button>
                <button name="Cancelar" class="formButton" type="button" value="Cancelar" id="Cancelar" onclick="window.history.go(-1); return false" >Cancelar</button>
            </div>

        </form>

        </div>
    <?php require_once "../../footer.php"?>     

    </body>

    
    <script type="text/javascript" src="../../script/validacionFormModificar.js"></script>
</html>