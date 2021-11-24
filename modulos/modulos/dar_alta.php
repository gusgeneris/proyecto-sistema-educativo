<?php 

require_once "../../class/Modulo.php";
require_once "../../configs.php";  

$idModulo=$_GET['id'];

$modulo=Modulo::darAlta($idModulo);


if($modulo){
    header("Location:listado.php?mj=".CORRECT_ALTA_CODE);
}



?>