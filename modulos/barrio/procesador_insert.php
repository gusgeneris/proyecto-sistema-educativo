<?php
require_once "../../class/Barrio.php";
require_once "../../class/Mysql.php";
require_once "../../configs.php";

$cancelar= $_POST['Cancelar'];

if($cancelar==true){
    header("Location:listado.php");
    exit;
}

$nombre= $_POST['Barrio'];

if((!preg_match("/[a-zA-Z0-9_ ]{2,254}/",$nombre))){
    header("Location:listado.php?mj=errorNombre");
    exit;
};

$idLocalidad=  $_POST['IdLocalidad'];


$barrio=new Barrio();
$barrio->setNombre($nombre);
$barrio->setIdLocalidad($idLocalidad);

$barrio->insertarBarrio();

if ($barrio){
    header("Location:listado.php?mj=".CORRECT_INSERT_CODE."&idLocalidad=".$idLocalidad);
}

?>