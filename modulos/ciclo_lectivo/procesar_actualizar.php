<?php
require_once "../../class/CicloLectivo.php";
require_once "../../configs.php";

$cancelar= $_POST['Cancelar'];

if($cancelar==true){
    header("Location:listado.php");
    exit;
}
$idCicloLectivo = $_POST['idCicloLectivo'];
$anio = $_POST['CicloLectivo'];

if((!preg_match("/^\d*$/",$anio))){
    header("Location:listado?mj=".ERROR_DNI_NUMBER_CODE );
    exit;
}




$cicloLectivo=new CicloLectivo();
$cicloLectivo->setIdCicloLectivo($idCicloLectivo);
$cicloLectivo->setAnio($anio);

$cicloLectivo->actualizarCicloLectivo();

if ($cicloLectivo){
    header("Location:listado.php?mj=".CORRECT_UPDATE_CODE);
}

?>