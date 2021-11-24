<?php
require_once "../../class/Carrera.php";
require_once "../../class/Materia.php";
require_once "../../class/CicloLectivo.php";
require_once "../../class/Calendarizacion.php";
require_once "../../class/EjeContenido.php";
require_once "../../class/DetalleCalendarizacion.php";
require_once "../../configs.php";



if(isset($_GET['idCurriculaCarrera'])){
    $idCurriculaCarrera=$_GET['idCurriculaCarrera'];
    $idCalendarizacion=$_GET['idCalendarizacion'];
    $lista = DetalleCalendarizacion::listado($idCurriculaCarrera);
    
    $listadoEjeContenido=EjeContenido::obtenerPorIdCurriculaCarrera($idCurriculaCarrera);
    
    $idCarrera= $_GET ['idCarrera'];
    $idMateria= $_GET ['idMateria'];

}else{

    $anio=date("Y");
    $idCiclo=CicloLectivo::obtenerIdCicloPorAnio($anio);
    $idCarrera= $_GET ['cboCarrera'];
    $idMateria= $_GET ['cboMateria'];

    $idCicloLectivoCarrera=Carrera::idCicloLectivoCarrera($idCiclo,$idCarrera);

    $idCurriculaCarrera=Carrera::idCurriculaCarrera($idCicloLectivoCarrera,$idMateria);

    $existencia=Calendarizacion::existenciaRelacion($idCurriculaCarrera);
    $listadoEjeContenido=EjeContenido::obtenerPorIdCurriculaCarrera($idCurriculaCarrera);


    if ($existencia==0){
        ?> 
        
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../../style/styleFormInsert.css">
            <link rel="stylesheet" href="/proyecto-modulos/style/tabla.css">
            <link href="../../icon/fontawesome/css/all.css" rel="stylesheet"> <!--Estilos para iconos -->
            <link rel="stylesheet" href="../../style/menuVertical.css">
            <link rel="stylesheet" href="../../style/mensaje.css">
            <script src="../../jquery3.6.js"></script>
            <script type="text/javascript" src="../../script/menu.js" defer> </script>
            <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Alumnos</title>
            <script type="text/javascript" src="../../script/validacion.js"></script>
        </head>

        <?php require_once "../../menu.php";
        require_once "../../mensaje.php";?>

        <body class="body-listuser">
            <section class="inexistencia">
                <div class="subtituloExistencia">
                    <h2>No Existe Calendarizacion para esta materia</h2>
                </div><br>
                <label for="">¿Desea agregar una nueva Calendarizacion</label><br>
                <form action='procesar_nueva_calendarizacion.php' method='POST'>
                    <input type="hidden" name="idCarrera" value="<?php echo $idCarrera ?>">
                    <input type="hidden" name="idMateria" value="<?php echo $idMateria ?>">
                    <button  type='submit' name='idCurriculaCarrera' value='<?php echo $idCurriculaCarrera?>'> Agregar Calendarizacion </button>
                </form>
            </section>
        
            <?php require_once "../../footer.php"?>                    
        </body>

</html>
            
        <?php exit;
    }else{
    
        $lista = DetalleCalendarizacion::listado($idCurriculaCarrera);
        $idCalendarizacion=Calendarizacion::obtenerIdCalendarizacion($idCurriculaCarrera);
        $listadoEjeContenido=EjeContenido::obtenerPorIdCurriculaCarrera($idCurriculaCarrera);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/styleFormInsert.css">
    <link rel="stylesheet" href="/proyecto-modulos/style/tabla.css">
    <link href="../../icon/fontawesome/css/all.css" rel="stylesheet"> <!--Estilos para iconos -->
    <link rel="stylesheet" href="../../style/menuVertical.css">
    <link rel="stylesheet" href="../../style/mensaje.css">
    <script src="../../jquery3.6.js"></script>
    <script type="text/javascript" src="../../script/menu.js" defer> </script>
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Alumnos</title>
    <script type="text/javascript" src="../../script/validacion.js"></script>
</head>

    <?php require_once "../../menu.php";
    require_once "../../mensaje.php";?>

    <body class="body-listuser">
        
        <div class="titulo">
            <?php 
                $carrera = Carrera::listadoPorId($idCarrera);
                $nombreCarrera=$carrera->getNombre();

                $materia = Materia::listadoPorId($idMateria);
                $nombreMateria=$materia->getNombre();
            ?>
            <h1>Calendarizacion <br> Carrera:<span><?php echo $nombreCarrera  ?></span> <br> Materia:<span><?php echo $nombreMateria  ?></span></h1>
        </div>
        
        <div class="main">
            <form method="POST" action="procesar_insert.php" method=POST class="formInsert2Columnas" id="formInsert" name="formInsert">


                <div class="formGrup" id="GrupoNumClase">
                    <div class="formGrupInput">
                        <label for="NumClase" class="formLabel">N° Clase</label>
                        <input type="number" id="NumClase" name="NumClase" class="formInput">
                    </div>
                    <p class="formularioInputError"> El Campo debe estar bien escrito.</p> 
                    
                </div> 
                
                <div class="formGrup" id="GrupoFecha">
                    <div class="formGrupInput">
                        <label for="Fecha" class="formLabel">Fecha</label>   
                        <input type="date" name="Fecha" id="Fecha" class="formInput">
                    </div>
                    <p class="formularioInputError"> El Campo debe estar bien escrito.</p> 
                </div> 
                <br>
                <div class="formGrup" id="GrupoActividad">
                    <div class="formGrupInput">
                        <label for="Actividad" class="formLabel">Actividad</label>   
                        <textarea name="Actividad" id="Actividad" class="formInput"></textarea>
                    </div>
                    <p class="formularioInputError"> El Campo debe estar bien escrito.</p> 
                </div>

                <div class="formGrup" id="GrupoContenido">
                    <div class="formGrupInput">
                        <label for="Contenido" class="formLabel">Contenido</label>   
                        <textarea name="Contenido" id="Contenido" class="formInput"></textarea>
                    </div>
                    <p class="formularioInputError"> El Campo debe estar bien escrito.</p> 
                </div>

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

                <input type="hidden" name="idCalendarizacion" value="<?php echo $idCalendarizacion?>">
                <input type="hidden" name="idCurriculaCarrera" value="<?php echo $idCurriculaCarrera?>">
                <input type="hidden" name="idMateria" value="<?php echo $idMateria?>">
                <input type="hidden" name="idCarrera" value="<?php echo $idCarrera?>">
               
                    <!--Grupo de Boton Enviar-->

                <div class="formGrupBtnEnviar">
                    <button type="submit" class="formButton" id='Guardar' value='FormInsertDetalleCalendarizacion'> Agregar Registro</button>
                </div>


            </form>
        </div>

        <div class="subtitulo" style="border-bottom: 1px solid">
            <h2>Detalles Cargados</h2>
        </div>

        <div class="formGrupBtnEnviar central">
            <button class="formButton" id="Buscar"><a href="../reportes/domPdf/reporte_calendarizacion.php?idCarrera=<?php echo $idCarrera ?>&idMateria=<?php echo $idMateria?>&idCurriculaCarrera=<?php echo $idCurriculaCarrera?>">Exportar a PDF</a></button>
        </div>

        <div class="conteiner3Columnas" >
            <table class="tabla" id="table">
                <thead>
                    <tr >
                        <th> Numero de Clase</th>
                        <th> Fecha Clase</th>
                        <th> Actividad</th>
                        <th> Contenido Priorizado</th>
                        <th> Numero Eje de Contenido</th>
                        <th> Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lista as $detalle ):?> 
                    <tr >
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
                            <?php echo $detalle->getNumeroEjeContenido(); ?>
                        </td>
                        <td>
                            <div class="icon">

                                <a href="#" onclick="consulta(<?php echo $idMateria?>,<?php echo $idCarrera?>,<?php echo $detalle->getIdDetalleCalendarizacion()?>,<?php echo $idCurriculaCarrera?>,<?php echo $idCalendarizacion?>)"><img class="icon-a" src="../../icon/basurero.png" title="Eliminar" alt="Eliminar"></a></a> 

                                <a href="modificar.php?idMateria=<?php echo $idMateria?>&idCarrera=<?php echo $idCarrera?>&idDetalleCalendarizacion=<?php echo $detalle->getIdDetalleCalendarizacion()?>&idCurriculaCarrera=<?php echo $idCurriculaCarrera?>&idCalendarizacion=<?php echo $idCalendarizacion?>&idDetalleCalendarizacion=<?php echo $detalle->getIdDetalleCalendarizacion()?>" ><img class="icon-a" src="../../icon/modificar.png" title="Modificar" alt="Modificar"></a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>    
            </table>
        </div>

        <?php require_once "../../footer.php"?>                    
    </body>

    <script type="text/javascript" src="../../script/validacionFormInsert.js"></script>
    <script>
        function consulta(idMateria,idCarrera,idDetalleCalendarizacion,idCurriculaCarrera,idCalendarizacion){

            if (confirm("¿Estas deguro que deseas eliminar?"))
            {
                window.location.href="eliminar.php?idMateria="+idMateria+"&idCarrera="+idCarrera+"&idDetalleCalendarizacion="+idDetalleCalendarizacion+"&idCurriculaCarrera="+idCurriculaCarrera+"&idCalendarizacion"+idCalendarizacion;
            }
        }
    </script>

</html>