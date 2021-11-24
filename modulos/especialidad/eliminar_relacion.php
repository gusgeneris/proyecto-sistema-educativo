<?php
require_once "../../class/Especialidad.php";
require_once "../../configs.php";
$idEspecialidad=$_GET["id"];
$idDocente=$_GET["idDocente"];

Especialidad::eliminarRelacionDocente($idEspecialidad,$idDocente);

header("Location:listado_por_docente.php?mj=".CORRECT_DELETE_CODE."&idDocente=".$idDocente);


?>