<?php
require_once "../../class/TipoContacto.php";


$descripcion = $_POST['TipoContacto'];

if((!preg_match("/[a-zA-Z]{2,254}/",$descripcion))){
    header("Location:listado.php?mj=errorNombre");
    exit;
};

$tipoContacto= new TipoContacto();
$tipoContacto->setDescripcion($descripcion);
$tipoContacto->insert();

header("Location:listado.php");


?>