<?php 

require_once "../../class/Pais.php";
require_once "../../configs.php";  

$idPais=$_GET['id'];

$docente=Pais::darAlta($idPais);


if($docente){
    header("Location:listado.php?mj=".CORRECT_ALTA_CODE);
}



?>