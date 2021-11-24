<?php
    require_once "../../class/DetalleCalendarizacion.php";
    require_once "../../configs.php";
    
    $cancelar= $_POST['Cancelar'];
    
    if($cancelar==true){
        header("Location:listado.php");
        exit;
    }
    
    $idCalendarizacion = $_POST['idCalendarizacion'];
    $numClase = $_POST['NumClase'];
    $fecha = $_POST['Fecha'];
    $actividad = $_POST['Actividad'];
    $contenidoPriorizado= $_POST['Contenido'];
    $idCurriculaCarrera = $_POST['idCurriculaCarrera'];
    $numeroEjeContenido= $_POST['cboEjeContenido'];
    $idCarrera = $_POST['idCarrera'];
    $idMateria= $_POST['idMateria'];
    
    
    if((!preg_match("/^\d*$/",$numClase))){
        header("Location:listado?mj=".ERROR_DNI_NUMBER_CODE );
        exit;
    } 
    
    
    $detalleCalendarizacion=new DetalleCalendarizacion();
    $detalleCalendarizacion->setNumeroClase($numClase);
    $detalleCalendarizacion->setFechaClase($fecha);
    $detalleCalendarizacion->setActividad($actividad);
    $detalleCalendarizacion->setContenidoPriorizado($contenidoPriorizado);
    $detalleCalendarizacion->setIdCalendarizacion($idCalendarizacion);
    $detalleCalendarizacion->setNumeroEjeContenido($numeroEjeContenido);
    
    $detalleCalendarizacion->insert();
    
    if ($detalleCalendarizacion){
        header("Location:detalle_calendarizacion.php?idMateria=".$idMateria."&idCarrera=".$idCarrera."&mj=".CORRECT_INSERT_CODE."&idCalendarizacion=".$idCalendarizacion."&idCurriculaCarrera=".$idCurriculaCarrera);
    }
    



?>