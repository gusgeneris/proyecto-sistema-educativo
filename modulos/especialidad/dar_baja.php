<?php
require_once "../../class/Especialidad.php";
require_once "../../configs.php";  
$idEspecialidad=$_GET["id"];

Especialidad::darDeBaja($idEspecialidad);

header("Location:listado.php?mj=".CORRECT_DELETE_CODE);


?>