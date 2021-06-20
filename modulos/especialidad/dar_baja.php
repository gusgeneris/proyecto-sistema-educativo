<?php
require_once "../../class/Especialidad.php";
$idEspecialidad=$_GET["id"];

Especialidad::darDeBaja($idEspecialidad);

header("Location:listado.php");


?>