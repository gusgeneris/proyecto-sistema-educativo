<?php
require_once "../../class/AnioDesarrollo.php";
$id=$_GET["id"];

AnioDesarrollo::darDeBaja($id);

header("Location:listado.php");


?>