<?php
require_once "../../class/Mysql.php";
require_once "../../class/TipoContacto.php";

$idTipocContacto= $_POST['IdTipoContacto'];

$descripcion= $_POST[' Descripcion'];

if((!preg_match("/[a-zA-Z]{2,254}/",$descripcion))){
    header("Location:listado.php?mj=errorNombre");
    exit;
};

$tipoContacto=new TipoContacto();

$tipoContacto->setIdTipoContacto($idTipoContacto);
$tipoContacto->setDescripcion($nombre);

$barrio->modificarBarrio();

header("Location:barrios.php?idLocalidad=".$idLocalidad);

?>