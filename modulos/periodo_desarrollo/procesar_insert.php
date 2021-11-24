<?php
require_once "../../class/PeriodoDesarrollo.php";
require_once "../../configs.php";

$cancelar= $_POST['Cancelar'];

if($cancelar==true){
    header("Location:listado.php");
    exit;
}

$detallePeriodo = $_POST['DetallePeriodo'];





if((!preg_match("/^[a-zA-Z_ ]*$/",$detallePeriodo))){
    header("Location:listado?mj=".ERROR_LONGITUD_LAST_NAME_CODE );
    exit;
} 



$periodoDesarrollo=new PeriodoDesarrollo;
$periodoDesarrollo->setDetallePeriodo($detallePeriodo);

$dato=$periodoDesarrollo->insert();


if ($dato==1){
    header("Location:listado.php?mj=".CORRECT_INSERT_CODE);
}else{
    header("Location:listado.php?mj=".INCORRECT_INSERT_DATO_DUPLICATE_CODE);
}

?>