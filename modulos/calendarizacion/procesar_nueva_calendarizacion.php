<?php
require_once "../../class/Calendarizacion.php";
require_once "../../configs.php";

$cancelar= $_POST['Cancelar'];

if($cancelar==true){
    header("Location:listado.php");
    exit;
}

$idCurriculaCarreraCiclo = $_POST['idCurriculaCarrera'];


$calendarizacion=new Calendarizacion();
$calendarizacion->setIdCurriculaCarreraCiclo($idCurriculaCarreraCiclo);

$calendarizacion->insert();

if ($calendarizacion){
    header("Location:detalle_calendarizacion.php?mj=".CORRECT_INSERT_CODE."&idCurriculaCarrera=".$idCurriculaCarreraCiclo);
}

?>