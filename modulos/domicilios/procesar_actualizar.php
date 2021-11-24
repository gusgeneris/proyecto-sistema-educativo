<?php
require_once "../../class/Mysql.php";
require_once "../../class/Domicilio.php";
require_once "../../configs.php"; 

$idDomicilio=$_POST['IdDomicilio'];
$idPersona= $_POST['IdPersona'];
$detalle=$_POST['DetalleDomicilio'];

if((!preg_match("/^[a-zA-Z0-9_ ]*$/",$detalleDomicilio))){
    header("Location:domicilios?mj=".ERROR_LONGITUD_LAST_NAME_CODE );
    exit;
} 

if ($idBarrio < 1){
    
    header("Location:domicilios.php?mj= error_id_barrio".ERROR_LONGITUD_LAST_NAME_CODE);
    
}

$domicilio=new Domicilio();

$domicilio->setIdDomicilio($idDomicilio);
$domicilio->setDetalle($detalle);

$domicilio->modificarDomicilio();

header("Location:domicilios?idPersona=".$idPersona."&mj=".CORRECT_UPDATE_CODE)



?>
