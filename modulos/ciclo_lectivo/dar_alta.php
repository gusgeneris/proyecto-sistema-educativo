<?php 

require_once "../../class/CicloLectivo.php";

require_once "../../configs.php";

$idCiclo=$_GET['id'];

$ciclo=CicloLectivo::darAlta($idCiclo);


if($ciclo){
    header("Location:listado.php?mj=".CORRECT_ALTA_CODE);
}



?>