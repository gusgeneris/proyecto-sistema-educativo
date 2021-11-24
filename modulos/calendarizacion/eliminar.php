<?php
require_once "../../class/DetalleCalendarizacion.php";
require_once "../../class/Mysql.php";
require_once "../../configs.php";

$idDetalleCalendarizacion=$_GET["idDetalleCalendarizacion"];
$idCurriculaCarrera=$_GET["idCurriculaCarrera"];
$idCalendarizacion=$_GET["idCalendarizacion"];
$idCarrera = $_GET['idCarrera'];
$idMateria= $_GET['idMateria'];

$eliminarRegistro=DetalleCalendarizacion::eliminarRegistro($idDetalleCalendarizacion);

header("Location:detalle_calendarizacion.php?idMateria=".$idMateria."&idCarrera=".$idCarrera."&mj=".CORRECT_DELETE_CODE."&idCurriculaCarrera=".$idCurriculaCarrera."&idCalendarizacion=".$idCalendarizacion);

?>