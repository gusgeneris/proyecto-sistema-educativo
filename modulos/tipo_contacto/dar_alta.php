<?php 

require_once "../../class/TipoContacto.php";
require_once "../../configs.php";  

$idTipoContacto=$_GET['id'];

$tipoContacto=TipoContacto::darAlta($idTipoContacto);


if($tipoContacto){
    header("Location:listado.php?mj=".CORRECT_ALTA_CODE);
}



?>