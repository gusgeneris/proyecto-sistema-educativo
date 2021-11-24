<?php
require_once "../../class/TipoContacto.php";
require_once "../../configs.php";


$descripcion = $_POST['TipoContacto'];

if((!preg_match("/[a-zA-Z]{2,254}/",$descripcion))){
    header("Location:listado.php?mj=ERROR");
    exit;
};

$tipoContacto= new TipoContacto();
$tipoContacto->setDescripcion($descripcion);
$tipoContacto->insert();

header("Location:listado.php?mj=".CORRECT_INSERT_CODE);


?>