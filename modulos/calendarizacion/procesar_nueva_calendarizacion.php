<?php
require_once "../../class/Calendarizacion.php";
require_once "../../configs.php";

$cancelar= $_POST['Cancelar'];


if($cancelar==true){
    header("Location:listado.php");
    exit;
}


$idCarrera= $_POST ['idCarrera'];
$idMateria= $_POST ['idMateria'];

$idCurriculaCarreraCiclo = $_POST['idCurriculaCarrera'];


$calendarizacion=new Calendarizacion();
$calendarizacion->setIdCurriculaCarreraCiclo($idCurriculaCarreraCiclo);

$idCalendarizacion=$calendarizacion->insert();

if ($calendarizacion){
    header("Location:detalle_calendarizacion.php?idCarrera=".$idCarrera."&idMateria=".$idMateria."&mj=".CORRECT_INSERT_CODE."&idCurriculaCarrera=".$idCurriculaCarreraCiclo."&idCalendarizacion=".$idCalendarizacion);
}

?>