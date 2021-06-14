<?php
require_once "../../class/Carrera.php";
$idCarrera=$_GET["id"];

Carrera::darDeBaja($idCarrera);

header("Location:listado.php");



?>