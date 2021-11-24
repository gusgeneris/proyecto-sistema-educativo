<?php
    require_once "../../class/Materia.php";
    require_once "../../class/PeriodoDesarrollo.php";
    require_once "../../class/AnioDesarrollo.php";
    require_once "../../configs.php";
    require_once "../../mensaje.php";

    $idMateria=$_GET["id"];
    $idCurriculaCarrera=$_GET["idCurriculaCarrera"];
    $materia=Materia::obtenerMateriaPorCurricula($idCurriculaCarrera);
    $listadoPerido=PeriodoDesarrollo::listaTodosActivos();
    $listaAnioDesarrollo=AnioDesarrollo::listaTodosActivos();
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
<script type="text/javascript" src="../../script/validacionFormModificar.js" defer></script>
    <script type="text/javascript" src="../../script/menu.js" defer> </script>
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Modificar Materia</title>
</head>

    <?php require_once "../../menu.php";?>

<body>
<div class="titulo">
    <h1>Ingrese los nuevos datos</h1>
</div>

<div class="main">
    <form action="procesar_actualizar_periodo_anio.php" method="POST" class="formModificarUnaColumna" id="formularioModificar" name="formularioMateriaModificar">

        
        <input name="idMateria" type="hidden" value="<?php echo $idMateria;?>">
        <input name="idCarrera" type="hidden" value="<?php echo $_GET["idCarrera"] ?>";>
        <input name="idCiclo" type="hidden" value="<?php  echo $_GET["idCiclo"]?>">
        <input name="idCurriculaCarrera" type="hidden" value="<?php  echo $idCurriculaCarrera?>">
        
        <div class="formGrup" id="GrupoNombreMateria" >
                <label for="NombreMateria" class="formLabel">Nombre Materia</label>
            <div class="formGrupInput">
                <input name="NombreMateria"class="formInput" type="text"  value="<?php echo $materia[0];?>" disabled>
            </div>
            <p class="formularioInputError"> El nombre no debe contener simbolos.</p>
        </div>

        <div class="formGrup" id="GrupocboPeriodoDesarrollo">
                <label for="cboPeriodoDesarrollo" class="formLabel">Periodo de desarrollo</label>
                <div class="formGrupInput">
                    <select id="cboPeriodoDesarrollo" class="formInput" required="required" name="cboPeriodoDesarrollo">
                        <option value="0">
                         Seleccionar
                        </option>
                        <?php foreach($listadoPerido as $periodo):?>
                        <option  <?php if($periodo->getIdPeriodoDesarrollo()==$materia[1]){echo "SELECTED";}?>  value="<?php echo $periodo->getIdPeriodoDesarrollo(); ?>">
                            <?php echo $periodo->getDetallePeriodo(); ?>
                        </option>
                        <?php endforeach?>
                    </select>
                </div>
                <p class="formularioInputError"> Debe seleccionar una opcion </p> 
        </div>

            <div class="formGrup" id="GrupocboAnioDesarrollo">
                <label for="cboAnioDesarrollo" class="formLabel labelSexo">Anio de desarrollo</label>
                <div class="formGrupInput">
                    <select id="cboAnioDesarrollo" class="formInput" required="required" name="cboAnioDesarrollo">
                        <option value="0">
                            Seleccionar
                        </option>
                        <?php foreach($listaAnioDesarrollo as $anio):?>
                        <option <?php if($anio->getIdAnioDesarrollo()==$materia[2]){echo "SELECTED";}?> value="<?php echo $anio->getIdAnioDesarrollo(); ?>">
                            <?php echo $anio->getDetalleAnio(); ?>
                        </option>
                        <?php endforeach?>
                    </select>
                </div>
                <p class="formularioInputError"> Debe seleccionar una opcion </p> 
            </div>

        <!--Grupo de Mensaje-->
                    
        <div class="formMensaje" id="GrupoMensaje">
                        
            <p class="MensajeError"> <b>Error</b>: Complete correctamente el Formulario </p>
                    
        </div>

                
        <div class="formGrupBtnEnviar3Columnas">
            <button type="submit" class="formButton" value ="" id="Guardar"> Guardar</button>
        
            <button name="Cancelar" class="formButton" type="submit" value="Cancelar" id="Cancelar" onclick="window.history.go(-1); return false" >Cancelar</button>
        </div>
    </form>
</div>
<?php require_once "../../footer.php"?> 

</body>


</html>