<?php
require_once "../../class/Especialidad.php";
$idEspecialidad=$_GET["id"];
$idDocente=$_GET["idDocente"];

Especialidad::darDeBaja($idEspecialidad);

header("Location:listado.php?idDocente=".$idDocente);


?>