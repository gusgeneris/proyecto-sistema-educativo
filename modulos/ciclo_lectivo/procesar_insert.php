<?php
require_once "../../class/CicloLectivo.php";
require_once "../../configs.php";

$cancelar= $_POST['Cancelar'];

if($cancelar==true){
    header("Location:listado.php");
    exit;
}

$anio = $_POST['Anio'];


$CicloLectivo=new CicloLectivo();
$CicloLectivo->setAnio($anio);

$CicloLectivo->insert();

if ($CicloLectivo){
    header("Location:listado.php?mj=".CORRECT_INSERT_CODE);
}

?>