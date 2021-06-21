<?php
require_once "../../class/EjeContenido.php";
$idEjeContenido=$_GET["id"];

$idCarrera=$_GET["idCarrera"];
$idMateria=$_GET["idMateria"];

EjeContenido::darDeBaja($idEjeContenido);

header("Location:listado.php?idCarrera=".$idCarrera."&idMateria=".$idMateria);


?>