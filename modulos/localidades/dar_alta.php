<?php 

require_once "../../class/localidad.php";
require_once "../../configs.php";  

$idLocalidad=$_GET['id'];

$idPais=$_GET['idPais'];

$idProvincia=$_GET["idProvincia"];

$localidad=Localidad::darAlta($idLocalidad);


if($localidad){
    header("Location:listado.php?idProvincia=".$idProvincia."&idPais=".$idPais."&mj=".CORRECT_ALTA_CODE);
}



?>