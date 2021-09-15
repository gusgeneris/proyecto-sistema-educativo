<?php
require_once "../../class/Mysql.php";
require_once "../../class/Localidad.php";

$idLocalidad= $_POST['IdLocalidad'];
$idProvincia=$_POST["IdProvincia"];

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

header("Location:localidades.php?idProvincia=".$idProvincia);



?>