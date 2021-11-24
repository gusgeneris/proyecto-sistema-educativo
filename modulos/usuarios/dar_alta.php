<?php 

require_once "../../class/Persona.php";
require_once "../../configs.php";  

$idPersona=$_GET['id'];

$persona=Persona::darAlta($idPersona);


if($persona){
    header("Location:listado.php?mj=".CORRECT_ALTA_CODE);
}



?>