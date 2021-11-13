<?php
require_once "../../class/CicloLectivo.php";
require_once "../../configs.php";

$idCicloLectivo=$_GET["id"];

CicloLectivo::darDeBaja($idCicloLectivo);

header("Location:listado.php?mj=".CORRECT_DELETE_CODE);


?>