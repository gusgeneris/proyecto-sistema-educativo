<?php 

require_once "../../class/PeriodoDesarrollo.php";
require_once "../../configs.php";  

$idPeriodoDesarrollo=$_GET['id'];

$periodoDesarrollo=PeriodoDesarrollo::darAlta($idPeriodoDesarrollo);


if($periodoDesarrollo){
    header("Location:listado.php?mj=".CORRECT_ALTA_CODE);
}



?>