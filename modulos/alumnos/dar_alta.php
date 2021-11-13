<?php 

require_once "../../class/Alumno.php";
require_once "../../configs.php";  

$idPersona=$_GET['id'];

$alumno=Alumno::darAlta($idPersona);


if($alumno){
    header("Location:listado.php?mj=".CORRECT_ALTA_CODE);
}



?>