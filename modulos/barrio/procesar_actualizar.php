<?php
require_once "../../class/Mysql.php";
require_once "../../class/Barrio.php";
require_once "../../configs.php";

$idLocalidad= $_POST['IdLocalidad'];
$idBarrio=$_POST["IdBarrio"];
$idProvincia=$_GET['idProvincia'];
$idPais=$_GET['idPais'];

$nombre= $_POST['Barrio'];

if((!preg_match("/^[a-zA-Z0-9_ ]*$/",$nombre))){
    header("Location:listado.php?mj=errorNombre");
    exit;
};

$barrio=new Barrio();

$barrio->setIdBarrio($idBarrio);
$barrio->setIdLocalidad($idLocalidad);
$barrio->setNombre($nombre);

$barrio->modificarBarrio();

header("Location:listado.php?idLocalidad=".$idLocalidad."&mj=".CORRECT_UPDATE_CODE."&idPais=".$idPais."&idProvincia=".$idProvincia);



?>