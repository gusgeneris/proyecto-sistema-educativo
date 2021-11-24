<?php
require_once "../../class/Localidad.php";
require_once "../../class/Mysql.php";
require_once "../../configs.php";

$cancelar= $_POST['Cancelar'];

if($cancelar==true){
    header("Location:localidades.php");
    exit;
}

$nombre= $_POST['Localidad'];


$idProvincia=  $_POST['IdProvincia'];
$idPais=  $_POST['IdPais'];

if((!preg_match("/[a-zA-Z ]{2,254}/",$nombre))){
    header("Location:listado.php?mj=errorNombre");
    exit;
};


$localidad=new Localidad();
$localidad->setNombre($nombre);
$localidad->setIdProvincia($idProvincia);

$localidad->insertarlocalidad();

if ($localidad){
    header("Location:listado.php?mj=".CORRECT_INSERT_CODE."&idProvincia=".$idProvincia."&idPais=".$idPais);
}

?>