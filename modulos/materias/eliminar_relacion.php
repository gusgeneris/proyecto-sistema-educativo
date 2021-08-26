<?php
require_once "../../class/Materia.php";

$idMateria=$_GET["id"];

$idCarrera=$_GET["idCarrera"];
$idCicloLectivo=$_GET["idCicloLectivo"];
Materia::eliminarRelacionCarrera($idMateria,$idCarrera);

header("Location:listado_por_carrera.php?idCarrera=".$idCarrera."&idCiclo=".$idCicloLectivo);


?>