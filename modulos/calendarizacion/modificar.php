<?php
require_once "../../class/DetalleCalendarizacion.php";
require_once "../../class/EjeContenido.php";
require_once "../../configs.php";
require_once "../../mensaje.php";

if(isset($_GET['id'])){
    $id=$_GET['id'];    
}
$idDetalleCalendarizacion=$_GET['idDetalleCalendarizacion'];
$idCalendarizacion=$_GET['idCalendarizacion'];
$idCurriculaCarrera=$_GET['idCurriculaCarrera'];
$idCarrera= $_GET ['idCarrera'];
$idMateria= $_GET ['idMateria'];

$lista = DetalleCalendarizacion::listado($idCurriculaCarrera);
$detalleCalendarizacion=DetalleCalendarizacion::listadoPorIdDetalle($idDetalleCalendarizacion);
$listadoEjeContenido=EjeContenido::obtenerPorIdCurriculaCarrera($idCurriculaCarrera);

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
    <div class="titu">
        <h1>Ingrese el nuevo dato</h1>
    </div>
    <div class="main">
        <form action="procesar_actualizar.php" method=POST class="formInsertUnaColumna" id="formModificar" name="formInsert">
            
            <div class=""> 
                <input name="idCurriculaCarrera" type="hidden" class="" value="<?php echo $idCurriculaCarrera; ?>">
                
                <input name="idDetalleCalendarizacion" type="hidden" class="" value="<?php echo $idDetalleCalendarizacion; ?>">
                
                <input name="idCalendarizacion" type="hidden" class="" value="<?php echo $detalleCalendarizacion->getIdCalendarizacion(); ?>">
            </div>

            <div class="formGrup" id="GrupoNumClase" > 
                <label for="NumClase" class="formLabel">Numero Clase</label> 
                    
                <div class="formGrupInput">
                    <input name="NumClase" type="text" class="formInput" id="NumClase" value="<?php echo $detalleCalendarizacion->getNumeroClase(); ?>">
                </div>
                <p class="formularioInputError"> La fecha de nacimiento no es necesariamente obligatoria.</p>         
            </div>

            <div class="formGrup" id="GrupoFechaClase" > 
                <label for="FechaClase" class="formLabel">Fecha Clase</label> 
                    
                <div class="formGrupInput">
                    <input name="FechaClase" type="text" class="formInput" id="FechaClase" value="<?php echo $detalleCalendarizacion->getFechaClase(); ?>">
                </div>
                <p class="formularioInputError"> La fecha de nacimiento no es necesariamente obligatoria.</p>         
            </div>

            <div class="formGrup" id="GrupoActividad" > 
                <label for="Actividad" class="formLabel">Actividad</label> 
                    
                <div class="formGrupInput">
                    <input name="Actividad" type="text" class="formInput" id="Actividad" value="<?php echo $detalleCalendarizacion->getActividad(); ?>">
                </div>
                <p class="formularioInputError"> La fecha de nacimiento no es necesariamente obligatoria.</p>         
            </div>

            <div class="formGrup" id="GrupoContenidoPriorizado" > 
                <label for="ContenidoPriorizado" class="formLabel">ContenidoPriorizado</label> 
                    
                <div class="formGrupInput">
                    <input name="ContenidoPriorizado" type="text" class="formInput" id="ContenidoPriorizado" value="<?php echo $detalleCalendarizacion->getContenidoPriorizado(); ?>">
                </div>
                <p class="formularioInputError"> La fecha de nacimiento no es necesariamente obligatoria.</p>         
            </div>

            
            <input type="hidden" name="idMateria" value="<?php echo $idMateria?>">
            <input type="hidden" name="idCarrera" value="<?php echo $idCarrera?>">
               

            <div class="formGrup ejeContenido" id="GrupocboEjeContenido" >
                        <label for="cboEjeContenido" class="formLabel">N° Eje de Contenido</label>
                        <div class="formGrupInput">
                            <Select name="cboEjeContenido" id="cboEjeContenido" class="formInput">
                                <option value="0">
                                   N° Eje de Contenido
                                </option>
                                <?php foreach($listadoEjeContenido as $ejeContenido):{?>
                                    <option value="<?php echo $ejeContenido->getNumero()?>">
                                    <?php echo $ejeContenido->getNumero()?>
                                </option>
                            <?php } endforeach; ?>
                            </Select>
                        </div>
                        <p class="formularioInputError"> El Nombre de Barrio no permite simbolos ni numeros.</p> 
                </div>
        
            
            <!--Grupo de Mensaje-->
                
            <div class="formMensaje" id="GrupoMensaje">
                    
                <p class="MensajeError"> <b>Error</b>: Complete correctamente el Formulario </p>
            
            </div>

            <!--Grupo de Boton Enviar-->
            <div class="formGrupBtnEnviarUnaColumna">
                <button type="submit" class="formButton" id='Guardar' value='FormInsertDetalleCalendarizacion'>Guardar</button>
                <button name="Cancelar" class="formButton" type="submit" value="Cancelar" id="Cancelar" onclick="window.history.go(-1); return false;">Cancelar</button>
            </div>
        </form>
    </div>
    <?php require_once "../../footer.php"?>   
</body>
<script type="text/javascript" src="../../script/validacionFormModificar.js"></script>
</html>