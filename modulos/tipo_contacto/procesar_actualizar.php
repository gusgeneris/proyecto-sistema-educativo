<?php
require_once "../../class/Mysql.php";
require_once "../../class/TipoContacto.php";
require_once "../../configs.php";

$idTipoContacto= $_POST['IdTipoContacto'];

$descripcion= $_POST['TipoContacto'];

if((!preg_match("/^[a-zA-ZÀ-ÿ\s ]{3,40}$/",$descripcion))){
    header("Location:listado.php?mj=errorNombre");
    exit;
};

$tipoContacto=new TipoContacto();

$tipoContacto->setIdTipoContacto($idTipoContacto);
$tipoContacto->setDescripcion($descripcion);


$tipoContacto->modificar();

header("Location:listado.php?mj=".CORRECT_UPDATE_CODE);

?>