<?php 

require_once "../../class/Provincia.php";
require_once "../../configs.php";  

$idProvincia=$_GET['id'];
$idPais=$_GET['idPais'];

$provincia=Provincia::darAlta($idProvincia);


if($provincia){
    header("Location:listado.php?idProvincia=".$idProvincia."&idPais=".$idPais."&mj=".CORRECT_ALTA_CODE);
}



?>