<?php
require_once "../../class/Materia.php";
$idMateria=$_GET["id"];
$idCarrera=$_GET["idCarrera"];

Materia::darDeBaja($idMateria);

header("Location:listado.php?idCarrera=".$idCarrera);

?>