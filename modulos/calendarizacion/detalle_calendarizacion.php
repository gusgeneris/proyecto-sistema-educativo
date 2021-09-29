<?php
require_once "../../class/Carrera.php";
require_once "../../class/Calendarizacion.php";
require_once "../../class/DetalleCalendarizacion.php";
require_once "../../configs.php";



if(isset($_GET['idCurriculaCarrera'])){
    $idCurriculaCarrera=$_GET['idCurriculaCarrera'];
    $idCalendarizacion=$_GET['idCalendarizacion'];
    $lista = DetalleCalendarizacion::listado($idCurriculaCarrera);
}else{

    $idCiclo= $_GET ['cboCicloLectivo'];
    $idCarrera= $_GET ['cboCarrera'];
    $idMateria= $_GET ['cboMateria'];

    $idCicloLectivoCarrera=Carrera::idCicloLectivoCarrera($idCiclo,$idCarrera);

    $idCurriculaCarrera=Carrera::idCurriculaCarrera($idCicloLectivoCarrera,$idMateria);

    $existencia=Calendarizacion::existenciaRelacion($idCurriculaCarrera);

    if ($existencia==0){
        ?> <section>
            <form action='procesar_nueva_calendarizacion.php' method='POST'>
                <button  type='submit' name='idCurriculaCarrera' value='<?php echo $idCurriculaCarrera?>'> Agregar Calendarizacion </button>
            </form>
        </section>
        <?php exit;
    }else{
    
        $lista = DetalleCalendarizacion::listado($idCurriculaCarrera);
        $idCalendarizacion=Calendarizacion::obtenerIdCalendarizacion($idCurriculaCarrera);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/proyecto-modulos/style/styleInsert.css" class="">
    <link rel="stylesheet" href="/proyecto-modulos/style/menu.css" class="">
    <link rel="stylesheet" href="/proyecto-modulos/style/style.css">
    <link rel="stylesheet" href="../../style/styleFormInsert.css">
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Alumnos</title>
    <script type="text/javascript" src="../../script/validacion.js"></script>
</head>

    <?php require_once "../../menu.php";?>

    <body class="body-listuser">
        <br>
        
        <div><h1 class="titulo">Calendarizacion</h1></div>
        <br>

        
        <form method="POST" action="procesar_insert.php" method=POST class="formInsert" id="formInsert" name="formInsert">

                <input type="hidden" name="idCalendarizacion" value="<?php echo $idCalendarizacion?>">
                <input type="hidden" name="idCurriculaCarrera" value="<?php echo $idCurriculaCarrera?>">

                <div class="formGrup" id="GrupoNumClase">
                    <div class="formGrupInput">
                        <label for="NumClase" class="formLabel">N° Clase</label>
                        <input type="number" id="NumClase" name="NumClase" class="formInput">
                    </div>
                    <p class="formularioInputError"> El Contacto debe estar bien escrito.</p> 
                    
                </div> 
                
                <div class="formGrup" id="GrupoFecha">
                    <div class="formGrupInput">
                        <label for="Fecha" class="formLabel">Fecha</label>   
                        <input type="date" name="Fecha" id="Fecha" class="formInput">
                    </div>
                    <p class="formularioInputError"> El Contacto debe estar bien escrito.</p> 
                </div> 

                <div class="formGrup" id="GrupoActividad">
                    <div class="formGrupInput">
                        <label for="Actividad" class="formLabel">Actividad</label>   
                        <textarea name="Actividad" id="Actividad" class="formInput"></textarea>
                    </div>
                    <p class="formularioInputError"> El Contacto debe estar bien escrito.</p> 
                </div>

                <div class="formGrup" id="GrupoContenido">
                    <div class="formGrupInput">
                        <label for="Contenido" class="formLabel">Contenido</label>   
                        <textarea name="Contenido" id="Contenido" class="formInput"></textarea>
                    </div>
                    <p class="formularioInputError"> El Contacto debe estar bien escrito.</p> 
                </div>
                
                &nbsp;&nbsp;&nbsp;
                    <!--Grupo de Mensaje-->
                        
                <div class="formMensaje" id="GrupoMensaje">
                            
                    <p class="MensajeError"> <b>Error</b>: Complete correctamente el Formulario </p>
                    
                </div>

                    <!--Grupo de Boton Enviar-->

                <div class="formGrupBtnEnviar">
                    <button type="submit" class="formButton" id='Guardar' value='FormInsertDetalleCalendarizacion'> Agregar Registro</button>
                </div>


            </form>
            <br>
        
        <table class="tabla" method="GET" id="table">
            <caption>Registros Cargados</caption>
            <tr >
                <th> ID Detalle</th>
                <th> Numero de Clase</th>
                <th> Fecha Clase</th>
                <th> Actividad</th>
                <th> Contenido Priorizado</th>

                <th> Acciones</th>

            </tr>
            <?php foreach ($lista as $detalle ):?> 
                <tr >
                    <td >
                        <?php echo $detalle->getIdDetalleCalendarizacion(); ?>
                    </td>
                    <td>
                        <?php echo $detalle->getNumeroClase(); ?>
                    </td>
                    <td>
                        <?php echo $detalle->getFechaClase(); ?>
                    </td>
                    <td>
                        <?php echo $detalle->getActividad(); ?>
                    </td>
                    <td>
                        <?php echo $detalle->getContenidoPriorizado(); ?>
                    </td>
                    
                    <td>
                        <a href="eliminar.php?idDetalleCalendarizacion=<?php echo $detalle->getIdDetalleCalendarizacion()?>&idCurriculaCarrera=<?php echo $idCurriculaCarrera?>&idCalendarizacion=<?php echo $idCalendarizacion?>">Borrar</a>|
                        <a href="modificar.php??idDetalleCalendarizacion=<?php echo $detalle->getIdDetalleCalendarizacion()?>&idCurriculaCarrera=<?php echo $idCurriculaCarrera?>&idCalendarizacion=<?php echo $idCalendarizacion?>&idDetalleCalendarizacion=<?php echo $detalle->getIdDetalleCalendarizacion()?>" >Modificar</a>
                    </td>

                </tr>
            <?php endforeach ?>    
        </table>
    </body>

    <script type="text/javascript" src="../../script/validacionFormInsert.js"></script>

</html>