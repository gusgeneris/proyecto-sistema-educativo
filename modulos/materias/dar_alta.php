<?php 

require_once "../../class/Materia.php";
require_once "../../configs.php";

$idMateria=$_GET['id'];

$materia=Materia::darAlta($idMateria);


if($materia){
    header("Location:listado.php?mj=".CORRECT_ALTA_CODE);
}



?>