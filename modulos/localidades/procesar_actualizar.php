<?php
require_once "../../class/Mysql.php";
require_once "../../class/Localidad.php";
require_once "../../configs.php";

$idLocalidad= $_POST['IdLocalidad'];
$idProvincia=$_POST["IdProvincia"];
$idPais=$_POST['IdPais'];

$nombre= $_POST['Localidad'];

if((!preg_match("/[a-zA-Z ]{2,254}/",$nombre))){
    header("Location:listado.php?mj=errorNombre");
    exit;
};

$localidad=new Localidad();

$localidad->setIdLocalidad($idLocalidad);
$localidad->setIdProvincia($idProvincia);
$localidad->setNombre($nombre);

$localidad->modificarLocalidad();

header("Location:listado.php?idProvincia=".$idProvincia."&mj=".CORRECT_UPDATE_CODE."&idPais=".$idPais);



?>