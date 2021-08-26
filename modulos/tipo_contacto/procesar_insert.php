<?php
require_once "../../class/TipoContacto.php";

$tipoContacto= new TipoContacto();
$descripcion = $_POST['Descripcion'];
$tipoContacto->setDescripcion($descripcion);
$tipoContacto->insert();

header("Location:listado.php");


?>