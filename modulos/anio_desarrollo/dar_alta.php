<?php 

require_once "../../class/AnioDesarrollo.php";
require_once "../../configs.php";  

$idAnioDesarrollo=$_GET['id'];

$anioDesarrollo=AnioDesarrollo::darAlta($idAnioDesarrollo);


if($anioDesarrollo){
    header("Location:listado.php?mj=".CORRECT_ALTA_CODE);
}



?>