<?php
require_once "../../class/DetalleCalendarizacion.php";
require_once "../../configs.php";

$cancelar= $_POST['Cancelar'];

if($cancelar==true){
    header("Location:detalle_calendarizacion.php");
    exit;
}

$idCurriculaCarrera= $_POST['idCurriculaCarrera'];
$idDetalleCalendarizacion = $_POST['idDetalleCalendarizacion'];
$idCalendarizacion = $_POST['idCalendarizacion'];
$numClase = $_POST['NumClase'];
$fecha = $_POST['FechaClase'];
$actividad = $_POST['Actividad'];
$contenidoPriorizado= $_POST['ContenidoPriorizado'];
$idCurriculaCarrera = $_POST['idCurriculaCarrera'];

if((!preg_match("/^\d*$/",$numClase))){
    header("Location:detalle_calendarizacion?mj=".ERROR_DNI_NUMBER_CODE );
    exit;
}




$detalleCalendarizacion=new DetalleCalendarizacion();
$detalleCalendarizacion->setNumeroClase($numClase);
$detalleCalendarizacion->setFechaClase($fecha);
$detalleCalendarizacion->setActividad($actividad);
$detalleCalendarizacion->setContenidoPriorizado($contenidoPriorizado);
$detalleCalendarizacion->setIdCalendarizacion($idCalendarizacion);
$detalleCalendarizacion->setIdDetalleCalendarizacion($idDetalleCalendarizacion);

$detalleCalendarizacion->actualizarDetalleCalendarizacion();

if ($detalleCalendarizacion){
    header("Location:detalle_calendarizacion.php?mj=".CORRECT_UPDATE_CODE."&idCurriculaCarrera=".$idCurriculaCarrera."&idCalendarizacion=".$idCalendarizacion);
}

?>