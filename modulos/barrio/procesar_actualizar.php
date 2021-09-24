<?php
require_once "../../class/Mysql.php";
require_once "../../class/Barrio.php";

$idLocalidad= $_POST['IdLocalidad'];
$idBarrio=$_POST["IdBarrio"];

$nombre= $_POST[' Barrio'];

if((!preg_match("/[a-zA-Z0-9_ ]{2,254}/",$nombre))){
    header("Location:listado.php?mj=errorNombre");
    exit;
};

$barrio=new Barrio();

$barrio->setIdBarrio($idBarrio);
$barrio->setIdLocalidad($idLocalidad);
$barrio->setNombre($nombre);

$barrio->modificarBarrio();

header("Location:listado.php?idLocalidad=".$idLocalidad);



?>