<?php
require_once "../../class/Horario.php";
require_once "../../configs.php";
$idHorario=$_GET["id"];

Horario::darDeBaja($idHorario);

header("Location:listado.php?mj=".CORRECT_DELETE_CODE);


?>