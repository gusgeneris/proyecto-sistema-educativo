<?php 

require_once "../../class/Docente.php";
require_once "../../configs.php";  

$idPersona=$_GET['id'];

$docente=Docente::darAlta($idPersona);


if($docente){
    header("Location:listado.php?mj=".CORRECT_ALTA_CODE);
}



?>