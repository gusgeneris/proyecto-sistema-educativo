<?php 

require_once "../../class/Carrera.php";

$idCarrera=$_GET['id'];

$carrera=Carrera::darAlta($idCarrera);


if($carrera){
    header("Location:listado.php?");
}



?>