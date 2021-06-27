<?php
require_once "../../class/Especialidad.php";
$idEspecialidad=$_GET["id"];
$idDocente=$_GET["idDocente"];

Especialidad::eliminarRelacionDocente($idEspecialidad,$idDocente);

header("Location:listado_por_docente.php?idDocente=".$idDocente);


?>