<?php
require_once "../../class/Mysql.php";
require_once "../../class/Pais.php";
require_once "../../configs.php";

$idPais= $_POST['IdPais'];
$nombre= $_POST['Pais'];

if((!preg_match("/[a-zA-Z ]{2,254}/",$nombre))){
    header("Location:listado.php?mj=errorNombre");
    exit;
};

$pais=new Pais();

$pais->setIdPais($idPais);
$pais->setNombre($nombre);

$pais->modificarPais();

header("Location:listado.php?mj=".CORRECT_UPDATE_CODE)



?>