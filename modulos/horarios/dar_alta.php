<?php 

require_once "../../class/Horario.php";
require_once "../../configs.php";

$idHorario=$_GET['id'];

$horario=Horario::darAlta($idHorario);


if($horario){
    header("Location:listado.php?mj=".CORRECT_ALTA_CODE);
}



?>