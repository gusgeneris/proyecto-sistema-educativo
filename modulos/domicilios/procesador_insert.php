<?php
require_once "../../class/Domicilio.php";
require_once "../../class/Mysql.php";
require_once "../../configs.php";

$cancelar= $_POST['Cancelar'];

if($cancelar==true){
    header("Location:Domicilios.php");
    exit;
}

$idPersona = $_POST['IdPersona'];

$detalleDomicilio= $_POST['DetalleDomicilio'];

$idBarrio=$_POST['cboBarrio'];

if((!preg_match("/^[a-zA-Z0-9_ ]*$/",$detalleDomicilio))){
    header("Location:domicilios?mj=".ERROR_LONGITUD_LAST_NAME_CODE );
    exit;
} 

if ($idBarrio < 1){
    
    header("Location:domicilios.php?mj= error_id_barrio".ERROR_LONGITUD_LAST_NAME_CODE);
    
}



$domicilio=new Domicilio();
$domicilio->setIdPersona($idPersona);
$domicilio->setDetalle($detalleDomicilio);
$domicilio->setIdBarrio($idBarrio);

$domicilio->insertarDomicilio();

if ($domicilio){
    header("Location:domicilios.php?mj=".CORRECT_INSERT_CODE."&idPersona=".$idPersona);
}

?>