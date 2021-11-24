<?php 

require_once "../../class/Barrio.php";
require_once "../../configs.php";  

$idBarrio=$_GET["id"];
$idLocalidad=$_GET["idLocalidad"];
$idProvincia=$_GET['idProvincia'];
$idPais=$_GET['idPais'];

$barrio=Barrio::darAlta($idBarrio);


if($barrio){
    header("Location:listado.php?idProvincia=".$idProvincia."&idPais=".$idPais."&mj=".CORRECT_ALTA_CODE."&idLocalidad=".$idLocalidad);
}



?>