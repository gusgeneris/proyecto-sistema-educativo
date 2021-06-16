<?php
require_once "../../class/CicloLectivo.php";
$idCicloLectivo=$_GET["id"];

CicloLectivo::darDeBaja($idCicloLectivo);

header("Location:listado.php");


?>