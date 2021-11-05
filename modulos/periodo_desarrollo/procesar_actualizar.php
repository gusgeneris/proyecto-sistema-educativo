<?php
require_once "../../class/PeriodoDesarrollo.php";
require_once "../../configs.php";

$cancelar= $_POST['Cancelar'];

if($cancelar==true){
    header("Location:listado.php");
    exit;
}
$idPeriodoDesarrollo = $_POST['idPeriodoDesarrollo'];
$detallePeriodo = $_POST['DetallePeriodo'];



if((!preg_match("/^[a-zA-ZÀ-ÿ\s]{3,40}$/",$detallePeriodo))){
    header("Location:listado?mj=".ERROR_LONGITUD_LAST_NAME_CODE );
    exit;
} 


$periodoDesarrollo=new PeriodoDesarrollo;
$periodoDesarrollo->setIdPeriodoDesarrollo($idPeriodoDesarrollo);
$periodoDesarrollo->setDetallePeriodo($detallePeriodo);

$periodoDesarrollo->actualizarPeriodoDesarrollo();

if ($periodoDesarrollo){
    header("Location:listado.php?mj=".CORRECT_UPDATE_CODE);
}

?>