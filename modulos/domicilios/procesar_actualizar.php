<?php
require_once "../../class/Mysql.php";
require_once "../../class/Domicilio.php";

$idDomicilio=$_POST['IdDomicilio'];
$idPersona= $_POST['IdPersona'];
$detalle=$_POST['Detalle'];

$domicilio=new Domicilio();

$domicilio->setIdDomicilio($idDomicilio);
$domicilio->setDetalle($detalle);

$domicilio->modificarDomicilio();

header("Location:domicilios?idPersona=".$idPersona)



?>
