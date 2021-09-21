<?php
require_once "../../class/AnioDesarrollo.php";
require_once "../../configs.php";

$cancelar= $_POST['Cancelar'];

if($cancelar==true){
    header("Location:listado.php");
    exit;
}

$detalleAnio = $_POST['DetalleAnio'];
echo $anioDesarrollo;exit;




if((!preg_match("/^[a-zA-Z_ ]*$/",$anioDesarrollo))){
    header("Location:listado?mj=".ERROR_LONGITUD_LAST_NAME_CODE );
    exit;
} 


$anioDesarrollo=new AnioDesarrollo;
$anioDesarrollo->setDetalleAnio($detalleAnio);

$anioDesarrollo->insert();

if ($CicloLectivo){
    header("Location:listado.php?mj=".CORRECT_INSERT_CODE);
}

?>