<?php
require_once "../../class/DetalleCalendarizacion.php";
require_once "../../class/Mysql.php";
require_once "../../configs.php";

$idDetalleCalendarizacion=$_GET["idDetalleCalendarizacion"];
$idCurriculaCarrera=$_GET["idCurriculaCarrera"];
$idCalendarizacion=$_GET["idCalendarizacion"];

$eliminarRegistro=DetalleCalendarizacion::eliminarRegistro($idDetalleCalendarizacion);

header("Location:detalle_calendarizacion.php?idCurriculaCarrera=".$idCurriculaCarrera."&idCalendarizacion=".$idCalendarizacion);

?>