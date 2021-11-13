<?php 

require_once "../../class/Carrera.php";
require_once "../../configs.php";

$idCarrera=$_GET['idCarrera'];
$idCicloLectivo= $_GET['idCicloLectivo'];

$alta=Carrera::darAltaAsignacionACiclo($idCicloLectivo,$idCarrera);


if($alta){
    header("Location:listado_por_ciclo.php?idCiclo=".$idCicloLectivo."&mj=".CORRECT_ALTA_CODE);
}



?>