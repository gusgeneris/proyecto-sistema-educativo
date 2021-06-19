<?php
require_once "../../class/EjeContenido.php";
$idEjeContenido=$_GET["id"];

EjeContenido::darDeBaja($idEjeContenido);

header("Location:listado.php");


?>