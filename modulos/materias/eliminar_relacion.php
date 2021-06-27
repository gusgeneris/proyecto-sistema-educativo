<?php
require_once "../../class/Materia.php";

$idMateria=$_GET["id"];

$idCarrera=$_GET["idCarrera"];

Materia::eliminarRelacionCarrera($idMateria,$idCarrera);

header("Location:listado_por_carrera.php?idCarrera=".$idCarrera);


?>