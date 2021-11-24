<?php 

require_once "../../class/Especialidad.php";
require_once "../../configs.php";  

$idEspecialidad=$_GET['id'];

$especialidad=Especialidad::darAlta($idEspecialidad);


if($especialidad){
    header("Location:listado.php?mj=".CORRECT_ALTA_CODE);
}



?>