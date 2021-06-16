<?php
require_once "../../class/Horario.php";
$idHorario=$_GET["id"];

Horario::darDeBaja($idHorario);

header("Location:listado.php");


?>