<?php
require_once "../../class/AnioDesarrollo.php";
require_once "../../configs.php";

$cancelar= $_POST['Cancelar'];

if($cancelar==true){
    header("Location:listado.php");
    exit;
}
$idAnioDesarrollo = $_POST['idAnioDesarrollo'];
$detalleAnio = $_POST['DetalleAnio'];



if((!preg_match("/^[a-zA-ZÀ-ÿ\s]{3,40}$/",$detalleAnio))){
    header("Location:listado?mj=".ERROR_LONGITUD_LAST_NAME_CODE );
    exit;
} 


$anioDesarrollo=new AnioDesarrollo;
$anioDesarrollo->setIdAnioDesarrollo($idAnioDesarrollo);
$anioDesarrollo->setDetalleAnio($detalleAnio);

$anioDesarrollo->actualizarAnioDesarrollo();

if ($anioDesarrollo){
    header("Location:listado.php?mj=".CORRECT_UPDATE_CODE);
}

?>