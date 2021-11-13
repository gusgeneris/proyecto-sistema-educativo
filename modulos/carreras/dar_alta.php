<?php 

require_once "../../class/Carrera.php";
require_once "../../configs.php";

$idCarrera=$_GET['id'];

$carrera=Carrera::darAlta($idCarrera);


if($carrera){
    header("Location:listado.php?mj=".CORRECT_ALTA_CODE);
}



?>