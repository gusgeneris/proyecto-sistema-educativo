<?php
require_once "../../class/Provincia.php";
require_once "../../class/Mysql.php";
require_once "../../configs.php";

$cancelar= $_POST['Cancelar'];

if($cancelar==true){
    header("Location:provincias.php");
    exit;
}

$nombre= $_POST['Provincia'];
$idPais= $_POST['IdPais'];

if((!preg_match("/[a-zA-Z ]{2,254}/",$nombre))){
    header("Location:listado.php?mj=errorNombre");
    exit;
};



$provincia=new Provincia();
$provincia->setNombre($nombre);
$provincia->setIdPais($idPais);

$provincia->insertarProvincia();

if ($provincia){
    header("Location:listado.php?mj=".CORRECT_INSERT_CODE."&idPais=".$idPais);
}

?>