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
$detalleDomicilio= $_POST['Detalle'];


$domicilio=new Domicilio();
$domicilio->setIdPersona($idPersona);
$domicilio->setDetalle($detalleDomicilio);

$domicilio->insertarDomicilio();

if ($domicilio){
    header("Location:domicilios.php?mj=".CORRECT_INSERT_CODE."&idPersona=".$idPersona);
}

?>