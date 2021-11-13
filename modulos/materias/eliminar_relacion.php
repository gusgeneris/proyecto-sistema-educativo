<?php
require_once "../../class/Materia.php";
require_once "../../configs.php";

$idMateria=$_GET["idMateria"];

$idCarrera=$_GET["idCarrera"];
$idCicloLectivo=$_GET["idCiclo"];
Materia::eliminarRelacionCarrera($idMateria,$idCarrera);

header("Location:listado_por_carrera.php?mj=".CORRECT_DELETE_CODE."&idCarrera=".$idCarrera."&idCiclo=".$idCicloLectivo);


?>