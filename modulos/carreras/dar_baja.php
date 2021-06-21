<?php
require_once "../../class/Carrera.php";
$idCarrera=$_GET["id"];
$idCicloLectivo=$_GET["idCiclo"];

Carrera::darDeBaja($idCarrera);

header("Location:listado.php?idCiclo=".$idCicloLectivo);



?>