<?php
require_once "../../class/Mysql.php";
require_once "../../class/Provincia.php";
require_once "../../configs.php";

$idPais= $_POST['IdPais'];
$idProvincia=$_POST["IdProvincia"];

echo $idProvincia;
$nombre= $_POST['Provincia'];

if((!preg_match("/[a-zA-Z ]{2,254}/",$nombre))){
    header("Location:listado.php?mj=errorNombre");
    exit;
};

$provincia=new Provincia();

$provincia->setIdProvincia($idProvincia);
$provincia->setIdPais($idPais);
$provincia->setNombre($nombre);

$provincia->modificarProvincia();

header("Location:listado.php?idPais=".$idPais."&mj=".CORRECT_UPDATE_CODE);



?>